<!DOCTYPE html>
<html lang="en">
<head>
<title>라임오렌지 나의 질문</title>
<?php include_once "./fragment/head.php";?>
<link href="css/style_cs_write.css" rel="stylesheet" />
</head>
<body>
<?php    
$connect = mysqli_connect("localhost","root" ,"password" ,"lime_orange" ) or die("connect fail");
		$number = $_GET['number'];
		$query = "SELECT title, content, date, id FROM  question_list WHERE number=$number";
		$result = $connect->query($query);
		$rows = mysqli_fetch_assoc($result);
		$title = $rows['title'];
		$content = $rows['content'];
		$usrid = $rows['id'];
		session_start();
?>
	<div class="container">
		<h4>글을 수정합니다.</h4>
			<div id="write_area">
				<form action="edit_action.php?number=<?php echo $number; ?>" method="post">
					<div id="in_title">
							<textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $rows['title']; ?></textarea>
						</div>
						<div class="wi_line"></div>
						<div id="in_name">
						<text name="name" id="uname" rows="1" cols="55" placeholder="글쓴이" maxlength="100" required><?php echo $rows['id']; ?></text>
						</div>
						<div class="wi_line"></div>
						<div id="in_content">
							<textarea name="content" id="ucontent" placeholder="내용" required><?php echo $rows['content']; ?></textarea>
						</div>
						<div id="in_pw">
							<input type="password" name="pw" id="upw"  placeholder="비밀번호" required />  
						</div>
						<div class="bt_se">
							<button type="submit">글 작성</button>
						</div>
				</form>
			</div>
  </div>
  </body>
</html>
