<?php
    $connect = mysqli_connect('localhost', 'root', "password", 'lime_orange') or die ("connect fail");
    $query ="select * from question_list order by number desc";
    $result = $connect->query($query);
    $total = mysqli_num_rows($result);
?>
