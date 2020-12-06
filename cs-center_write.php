<!DOCTYPE html>
<html lang="en">
  <head>
    <title>라임오렌지 1:1 질문</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="css/style_cs_write.css" rel="stylesheet" />
  </head>
  <body>
    <!-- header -->
    <header id="fixed-bar">
      <div class="logo">
        <a href="/">
          <img src="/data/logo.PNG  " atl="logo" />
        </a>
      </div>
      <div class="searchingbox">
        <input
          type="text"
          id="header-search-input"
          placeholder="지역 이름, 물품명 등을 검색해보세요!"
        />
        <button id="header-search-button">
          <i class="fas fa-search"></i>
        </button>
      </div>
      <div class="web_or_app">
        <a
          target="_blank"
          href="https://www.apple.com/kr/app-store/"
          id="apple"
        >
          <i class="fab fa-apple"></i>
          <div class="fixed-download-text">App Store</div>
        </a>
        <a target="_blank" href="https://play.google.com/store">
          <i class="fab fa-google-play"></i>
          <div class="fixed-download-text">Google Play</div>
        </a>
      </div>
    </header>
      <!-- <?php
        session_start();
        $URL = "./index.php";
        if(!isset($_SESSION['userid'])) {
        ?>
        <script>
          alert("로그인이 필요합니다");
          location.replace("<?php echo $URL?>");
        </script>
        <?php
          }
        ?> -->
    <div class="container">
      <h2>나의 질문</h2> 
        <form method = "post" action = "write_action.php">
        <table  style="padding-top:50px" align = center width=700 cellpadding=2 >
          <tr>
        <td height=20 align= center bgcolor=#ccc><font color=white> 글쓰기</font></td>
        </tr>
        <tr>
        <td >
        <table class = "table2">
                <tr>
                <!-- <td>작성자</td>
                  <td><input type="hidden" name="name" value="<?=$_SESSION['userid']?>"><?=$_SESSION['userid']?></td> -->
                </tr>
                <tr>
                <td>제목</td>
                <td><input type = text name = title size=60></td>
                </tr>

                <tr>
                <td>내용</td>
                        <td><textarea name = content cols=85 rows=15></textarea></td>
                </tr>
                </table>
                <input type = "submit" value="작성">
                </td>
                </tr>
        </table>
        </form>


    </div>
  </body>
</html>
