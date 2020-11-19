var http = require('http');
var fs = require('fs');
var url = require('url');
var qs = require('querystring');
const {
    profile
} = require('console');

function templateHTML(title, content, image, description, article_profile) {
    return `
        <!doctype html>
        <html>
        <head>
            <title>${title} Gift</title>
            <meta charset="utf-8">
        </head>
        <body>
        <!-- header -->
        <header id="fixed-bar">
            <div class="logo">
                <a href="/">
                    <i class="fas fa-hat-wizard"></i>
                    <span class="Magic">MAGIC</span>
                </a>
            </div>
            <div class="searchingbox">
                <input type="text" name="header-search-input" id="header-search-input" class="fixed-search-input" placeholder="지역 이름, 물품명 등을 검색해보세요!" />
                <button id="header-search-button">
                <i class="fas fa-search"></i>
                </button>

            </div>

            <div class="web_or_app">
                <i class="fas fa-desktop"></i>
                <i class="fab fa-google-play"></i>
                <i class="fab fa-apple"></i>
            </div>
        </header>
            <article id="content">
            <h1>${content}</h1>
                <section id="article-images">
                ${image}
                </section>
                <section id="article-profile">
                ${article_profile}
                </section>
                <section id="description>
                ${description}
                </section>
            </article>
        </body>
        </html>
        `;
}

function templateList(filelist) {
    var list = '<ul>';
    var i = 0;
    while (i < filelist.length) {
        list = list + `<li><a href="/?id=${filelist[i]}">${filelist[i]}</a></li>`;
        i += 1;
    }
    list = list + '</ul>';
    return list;
}
var app = http.createServer(function (request, response) {
    var _url = request.url;
    var queryData = url.parse(_url, true).query;

    fs.readdir('./data', function (error, filelist) {
        fs.readFile(`data/${queryData.id}`, 'utf8', function (err, description) {
            var title = queryData.id;
            var list = templateList(filelist);
            var template = templateHTML(title, list, `<h2>${title}</h2>{description`,
                `<a href="/create">create</a> <a href="/update?id=${title}">update</a>`);
            response.writeHead(200);
            response.end(template);
        });
    });

});
app.listen(3000);