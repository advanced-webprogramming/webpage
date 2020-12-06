<!DOCTYPE html>
<html lang="en">

<head>
<?php include_once "./fragment/head.php";?>
<title>라임오렌지 고객센터</title>
  <link href="css/style_cs-center.css" rel="stylesheet" />
  <script src="cs-center.js"></script>
</head>

<body>
  <!-- header -->
  <?php include_once "./fragment/header.php";?>

  <!-- 질문리스트 -->
  <div class="cs_header">
    <div id="title">
      <h1>고객센터</h1>
      <h2>_새로운 소식과 다양한 정보<br>궁금한 점은 빠르게</h2>
    </div>
    <div class="searchingbox">
      <input type="text" id="container-search" placeholder="검색을 통해 쉽게 찾아보세요"/>
      <button id="header-search-button">
        <i class="fas fa-search"></i>
      </button>
    </div>  
  </div>  
    <br /><br/>
  <?php
          $connect = mysqli_connect('localhost', 'root', "password", 'lime_orange') or die ("connect fail");
          $query ="select * from question_list order by number desc";
          $result = $connect->query($query);
          $total = mysqli_num_rows($result);
      ?>
  <div class=write_button>
    <button onClick="location.href='./cs-center_write.php'">글쓰기</button>
  </div>
  <div class="content">
    <table class="table table-hover table-striped text-center" style="border: lpx solid">
      <thead>
        <tr>
          <td width="50">번호</td>
          <td width="500">제목</td>
          <td width="100">작성자</td>
          <td width="200">날짜</td>
          <td width="50">조회수</td>
        </tr>
      </thead>

      <tbody>
        <?php
              while($rows = mysqli_fetch_assoc($result)){ //DB에 저장된 데이터 수 (열 기준)
                  if($total%2==0){
            ?> <tr class="even">
          <?php   }
                else{
            ?>
        <tr>
          <?php } ?>
          <td width="50"><?php echo $total?></td>
          <td width="500">
            <a href="cs-center_view.php?number=<?php echo $rows['number']?>">
              <?php echo $rows['title']?></td>
          <td width="100"><?php echo $rows['id']?></td>
          <td width="200"><?php echo $rows['date']?></td>
          <td width="50"><?php echo $rows['hit']?></td>
        </tr>
        <?php
            $total--;
            }
          ?>
      </tbody>
    </table>
  </div>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>



  <!--  부트스트랩 js 사용 -->
  <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script> -->
</body>

</html>