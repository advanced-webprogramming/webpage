<?php
	$connect = mysqli_connect("localhost","root" ,"password" ,"lime_orange" ) or die("connect fail");
	$number = $_GET['number'] ;
  $query = "DELETE FROM question_list WHERE number='$number'";
  $result = $connect->query($query);
    ?>
<script type="text/javascript">alert("삭제되었습니다."); 
location.href='./cs-center.php';</script>";
