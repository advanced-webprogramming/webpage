var fs = require('fs');
var path = require('path');
var mysql = require('mysql');
var express = require('express');
var session = require('express-session');
var socket= require('socket.io');
var bodyParser = require('body-parser');
var ejs = require('ejs');

var connection = mysql.createConnection({
	host     : 'localhost',
	user     : 'web2020',
	password : 'web2020',
	database : 'web'
});

var app = express();
app.use(session({
	secret: 'secret',
	resave: true,
	saveUninitialized: true
}));

app.use(express.static('public'));
app.use(bodyParser.urlencoded({extended : true}));
app.use(bodyParser.json());


function restrict(req, res, next) {
  if (req.session.loggedin) {
    next();
  } else {
    req.session.error = 'Access denied!';
    res.sendFile(path.join(__dirname + '/my/login.html'));
  }
}

app.use('/', function(request, response, next) {
	if ( request.session.loggedin == true || request.url == "/login" || request.url == "/register" ) {
    next();
	}
	else {
    response.sendFile(path.join(__dirname + '/my/login.html'));
	}
});

app.get('/', function(request, response) {
	response.sendFile(path.join(__dirname + '/my/home.html'));
});

app.get('/login', function(request, response) {
	response.sendFile(path.join(__dirname + '/my/login.html'));
});

app.post('/login', function(request, response) {
	var username = request.body.username;
	var password = request.body.password;
	if (username && password) {
		connection.query('SELECT * FROM user WHERE username = ? AND password = ?', [username, password], function(error, results, fields) {
			if (error) throw error;
			if (results.length > 0) {
				request.session.loggedin = true;
				request.session.username = username;
				response.redirect('/home');
				response.end();
			} else {
				//response.send('Incorrect Username and/or Password!');
				response.sendFile(path.join(__dirname + '/my/loginerror.html'));
			}			
		});
	} else {
		response.send('Please enter Username and Password!');
		response.end();
	}
});

app.get('/register', function(request, response) {
	response.sendFile(path.join(__dirname + '/my/register.html'));
});

app.post('/register', function(request, response) {
	var username = request.body.username;
	var password = request.body.password;
	var password2 = request.body.password2;
	var email = request.body.email;
	console.log(username, password, email);
	if (username && password && email) {
		connection.query('SELECT * FROM user WHERE username = ? AND password = ? AND email = ?', [username, password, email], function(error, results, fields) {
			if (error) throw error;
			if (results.length <= 0) {
        connection.query('INSERT INTO user (username, password, email) VALUES(?,?,?)', [username, password, email],
            function (error, data) {
                if (error)
                  console.log(error);
                else
                  console.log(data);
        });
			  response.send(username + ' Registered Successfully!<br><a href="/home">Home</a>');
			} else {
				response.send(username + ' Already exists!<br><a href="/home">Home</a>');
			}			
			response.end();
		});
	} else {
		response.send('Please enter User Information!');
		response.end();
	}
});

app.get('/logout', function(request, response) {
  request.session.loggedin = false;
	response.send('<center><H1>Logged Out.</H1><H1><a href="/">Goto Home</a></H1></center>');
	response.end();
});

app.get('/home', restrict, function(request, response) {
	if (request.session.loggedin) {
		response.sendFile(path.join(__dirname + '/my/home.html'));
	} else {
		response.send('Please login to view this page!');
		response.end();
	}
});

app.get('/test2', function(request, response) {
	if (request.session.loggedin) {
		response.sendFile(path.join(__dirname + '/my/test2.html'));
	} else {
		response.send('Please login to view this page!');
		response.end();
	}
});

app.get('/full', function(request, response) {
	response.sendFile(path.join(__dirname + '/board/full.html'));
});

app.get('/list', function(request, response) {
	response.sendFile(path.join(__dirname + '/board/list.html'));
});

app.get('/patagonia', function(request, response) {
	response.sendFile(path.join(__dirname + '/public/patagonia.html'));
});

app.get('/list', function(request, response) {
	response.sendFile(path.join(__dirname + '/public/list.html'));
});

app.get('/index', function(request, response) {
	response.sendFile(path.join(__dirname + '/public/list.html'));
});

app.get('/chat', function(request, response) {
	response.sendFile(path.join(__dirname + '/public/chat/static/chat.html'));
});

app.get('/images', function(request, response) {
	response.sendFile(path.join(__dirname + '/my/images.html'));
});

// Board
app.get('/board', function (request, response) { 
    // ������ �н��ϴ�.
    fs.readFile(__dirname + '/board/list.html', 'utf8', function (error, data) {
        // �����ͺ��̽� ������ �����մϴ�.
        connection.query('SELECT * FROM products', function (error, results) {
            // �����մϴ�.
            response.send(ejs.render(data, {
                data: results
            }));
        });
    });
});

app.get('/test2', function (request, response) { 
    // ������ �н��ϴ�.
    fs.readFile(__dirname + '/board/list.html', 'utf8', function (error, data) {
        // �����ͺ��̽� ������ �����մϴ�.
        connection.query('SELECT * FROM products', function (error, results) {
            // �����մϴ�.
            response.send(ejs.render(data, {
                data: results
            }));
        });
    });
});

app.get('/test2', function (request, response) {
    // ������ �����մϴ�.
var body = request.body

// �����ͺ��̽� ������ �����մϴ�.
connection.query('UPDATE products SET picture=?, title=?, instruction=?, price=?, hashtag=?, image=?, WHERE id=?', [
    body.picture, body.title, body.instruction, body.price, body.hashtag, body.image, request.param('id')
], function () {
    // �����մϴ�.
    response.redirect('/board');
});
});

app.get('/test2', function (request, response) {	
    // ������ �н��ϴ�.
    fs.readFile(__dirname + '/board/test2.html', 'utf8', function (error, data) {
        // �����մϴ�.
        response.send(data);
    });
});


app.get('/delete/:id', function (request, response) { 
    // �����ͺ��̽� ������ �����մϴ�.
    connection.query('DELETE FROM products WHERE id=?', [request.param('id')], function () {
        // �����մϴ�.
        response.redirect('/board');
    });
});
app.get('/insert', function (request, response) {	
    // ������ �н��ϴ�.
    fs.readFile(__dirname + '/board/insert.html', 'utf8', function (error, data) {
        // �����մϴ�.
        response.send(data);
    });
});
app.post('/insert', function (request, response) {
    // ������ �����մϴ�.
    var body = request.body;

    // �����ͺ��̽� ������ �����մϴ�.
    connection.query('INSERT INTO products (category, picture, title, instruction, price, hashtag, image) VALUES (?, ?, ?, ?, ?, ?, ?)', [
        body.category, body.picture, body.title, body.instruction, body.price, body.hashtag, body.image
    ], function () {
        // �����մϴ�.
        response.redirect('/board');
    });
});
app.get('/edit/:id', function (request, response) {
	    // ������ �н��ϴ�.
    fs.readFile(__dirname + '/board/edit.html', 'utf8', function (error, data) {
        // �����ͺ��̽� ������ �����մϴ�.
        connection.query('SELECT * FROM products WHERE id = ?', [
            request.param('id')
        ], function (error, result) {
            // �����մϴ�.
            response.send(ejs.render(data, {
                data: result[0]
            }));
        });
    });
});
app.post('/edit/:id', function (request, response) {
	    // ������ �����մϴ�.
    var body = request.body

    // �����ͺ��̽� ������ �����մϴ�.
    connection.query('UPDATE products SET picture=?, title=?, instruction=?, price=?, hashtag=?, image=?, WHERE id=?', [
        body.picture, body.title, body.instruction, body.price, body.hashtag, body.image, request.param('id')
    ], function () {
        // �����մϴ�.
        response.redirect('/board');
    });
});


app.listen(3000, function () {
    console.log('Server Running at http://127.0.0.1:3000');
});