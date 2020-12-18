<!-- header -->
<header id="fixed-bar">
      <div class="logo">
        <a href="../view/main-home.php.">
        <?php
        echo "<img src='../assets/images/logo.png'/>";
        ?>
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