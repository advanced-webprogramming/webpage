<?php 
  $connect = mysqli_connect("localhost","root" ,"password" ,"lime_orange" ) or die("connect fail");
  $number = $_GET['number'];
  $date = date('Y-m-d H:i:s');
  $userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
  $title = $_POST['title'];
  $content = $_POST['content'];
  $query = "UPDATE question_list set title='$title', content='$content', date='$date' WHERE number='$number'";
  $result = $connect->query($query);
?>

<script type="text/javascript">alert("수정되었습니다."); 
location.href='./cs-center.php';</script>";
