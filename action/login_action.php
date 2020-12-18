<?php
    $id= $_POST['id'];
    $password =password_hash( $_POST['password'],PASSWORD_DEFAULT); 
    $con = mysqli_connect("localhost", "root", "password", "lime_orange") or die("fail");
    $query = "SELECT * FROM user WHERE usrId='$id'";
    $result = mysqli_query($con, $query);

    $num_match = mysqli_num_rows($result);

    if(!$num_match) {
      echo("
            <script>
              window.alert('등록되지 않은 아이디입니다!')
              history.go(-1)
            </script>
          ");
    } else {
        $row = mysqli_fetch_array($result);
        $db_pass = $row['password'];
        mysqli_close($con);

        if(!password_verify($password, $db_pass)){
            echo("
                  <script>
                    window.alert('비밀번호가 틀립니다!')
                    history.go(-1)
                  </script>
              ");
              exit;
        }else {
            session_start();
            $_SESSION["id"] = $row["id"];
;        
            echo("
              <script>
                location.href = history.back();
              </script>
            ");
        }
    }        
?>