<!-- header -->
<header id="fixed-bar">
      <div class="logo">
        <a href="/">
          <?php

          $name="/data/logo.png";
          $fp=fopen($name,'rb');
          header("Content-Type: image/png");
          header("Content-Length: " . filesize($name));
          fpassthru($fp);
          exit;
            // $file="/data/logo.png";
            // header("Content-type:image/png");
            // header("Content-Disposition:inline;filename=".basename($file)."");
            // header("Content-length:".filesize($file));
            // $filesize=filesize();
            // readfile($file);
            // $image = file_get_contents($file);
            // echo $imgae;
            // echo "<img src='/data/logo.PNG' alt='logo'/>";
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