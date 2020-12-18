<!DOCTYPE html>
<html lang="en">
  <head>
    <title>라임오렌지 1:1 질문</title>
    <?php include_once "../fragment/head.php";?>
    <link href="../css/style_cs_write.css" rel="stylesheet" />
    <link href="../css/header.css" rel="stylesheet" />
  </head>
  <body>
    <!-- header -->
    <?php include_once "../fragment/header.php";?>
    </header>
      <?php
        session_start();
        $URL = "./cs-center.php";
        if(!isset($_SESSION['id'])) {
        ?>
        <script>
          alert("로그인이 필요합니다");
          location.replace("<?php echo $URL?>");
        </script>
        <?php
          }
        ?>
    <div class="container">
      <h2>나의 질문</h2> 
        <form method = "post" action = "../action/write_action.php">
        <div id="in_title">
              <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
          </div>
          <div class="wi_line"></div>
          <div id="in_name">
              <textarea name="name" id="uname" rows="1" cols="55" placeholder="글쓴이" maxlength="100" required></textarea>
          </div>
          <div class="wi_line"></div>
          <div id="in_content">
              <textarea name="content" id="ucontent" placeholder="내용" required></textarea>
          </div>
          <div id="in_pw">
              <input type="password" name="pw" id="upw"  placeholder="비밀번호" required />  
          </div>
          <div id="in_lock">
              <input type="checkbox" value="1" name="lockpost" />해당글을 잠급니다.
          </div>
          <div class="bt_se">
              <button type="submit">글 작성</button>
          </div>
        </form>


    </div>
  </body>
</html>
