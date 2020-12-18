<?php
      $connect = mysqli_connect('localhost', 'root', "password", 'lime_orange') or die("fail");
      if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
      }
      $id = $_POST['name']; //Writer
      $title = $_POST['title']; //Title
      $content = $_POST['content']; //Content
      $date = date('Y-m-d H:i:s');  //Date
      $pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);

      function mq($sql){
        global $connect;
        return $connect->query($sql);
      }
      
      if(isset($_POST['lockpost'])){
        $lo_post = '1';
      }else{
        $lo_post = '0';
      }

      if($id && $pw && $title && $content){
        $sql = mq("INSERT INTO question_list (number,title, content, date, hit, id, pw,lock_post) 
        VALUES (null,'$title', '$content', '$date',0, '$id', '$pw','$lo_post')");
        $mqq = mq("alter table board auto_increment =1");
        echo "<script>
        alert('글쓰기 완료되었습니다.');
        location.href='../view/cs-center.php';</script>";

    }else{
        echo "<script>
        alert('글쓰기에 실패했습니다.');
        history.back();</script>";
    }
    mysqli_close($connect);
?>
