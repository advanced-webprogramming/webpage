<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include_once "./fragment/head.php";?>
    <link href="css/style_main-home.css" rel="stylesheet" />
    <script src="main.js"></script>
    <title> 라임오렌지</title>
  </head>

  <body>
    <?php include_once "./fragment/header.php";?>

    <!-- 메인화면 -->
    <section class="home-main">
      <div id="home-main-top">
        <!-- <object type="image/svg+xml" data="data/park.svg" class="back-image"></object> -->
        <h1>이웃들과 함께<br />아낌없이 주는<br />라임 오렌지 마켓</h1>
      </div>
    </section>

    <!-- 페이지 기능 설명 -->
    <section class="service" id="direct_translate">
      <div>
        <h1>가까운 이웃과 <br />간편하게 빠르게</h1>
        <a href="">인기 상품 보기</a>
      </div>

      <img src="/data/Chat.jpg" alt="Chat" />
    </section>
    <section class="service" id="search-term-list">
      <h1>주간 인기 검색어를 한눈에</h1>
    </section>
    <section class="service" id="search-filter">
      <h1>당신의 취향에 맞춘 <br />검색 결과</h1>
    </section>

    <!-- footer -->
    <footer id="footer">
      <div class="footer-top">
        <h2>라임 오렌지</h2>
        <ul class="footer-list">
          <li>회사 소개</li>
          <li>광고주센터</li>
        </ul>
        <ul class="footer-list-policy">
          <li>이용약관</li>
          <li>개인정보처리방침</li>
        </ul>
      </div>
      <div class="footer-bottom">
        <div id="cotyright">
          <ul class="copyright-list">
            <li>
              "고객문의"
              <a href="/">라임오렌지 cs센터</a>
            </li>
            <li>체휴문의</li>
          </ul>
        </div>
      </div>
    </footer>
  </body>
</html>
