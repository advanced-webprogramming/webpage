
<!DOCTYPE html>
<html lang="en">

<head>
<?php include_once "../fragment/head.php";?>
<title>라임오렌지 고객센터</title>
  <link href="../css/style_cs-center.css" rel="stylesheet" />
  <link href="../css/header.css" rel="stylesheet" />
  <!-- <script src="cs-center.js"></script> -->
</head>

<body>
  <!-- header -->
  <?php include_once "../fragment/header.php";?>
  <!-- 페이징, 검색 코드 -->
  <?php 
	if (isset($_GET["page"]))
		$page = $_GET["page"]; //1,2,3,4,5
	else
    $page = 1;
  
    if(isset($_GET['catgo'])) {
      $catagory = $_GET['catgo'];
      $subString .= '&amp;catgo=' . $catgory;
    }
    if(isset($_GET['search'])) {
      $search_con = $_GET['search'];
      $subString .= '&amp;search=' . $search_con;
    }
  
    if(isset($catgo) && isset($search)) {
      $catagory = $_GET['catgo'];
      $search_con = $_GET['search'];
  
    } 
    else{
      $search_con='';
    }
      $connect = mysqli_connect('localhost', 'root', "password", 'lime_orange') or die ("connect fail");
      // $query ="select * from question_list order by number desc";
      // $result = $connect->query($query);
      // $total = mysqli_num_rows($result);
?>

  <div class="cs_header">
    <div id="title">
    
      <h1><a href="/cs-center.php">고객센터</a> </h1>
      <h2>_새로운 소식과 다양한 정보<br>궁금한 점은 빠르게</h2>
    </div>
    <!--질문글 검색 -->
    <div class="searchingbox">
      <form action="cs-center_search.php" method="get">
        <select name="catgo">
          <option value="title">제목</option>
          <option value="name">글쓴이</option>
          <option value="content">내용</option>
        </select>
        <input type="text" id="header-search-input" name="search" required="required" placeholder="<?php echo $search_con; ?>"/>
      <button id="header-search-button">
        <i class="fas fa-search"></i>
      </button>
      </form>
      
    </div>  
  </div> 

  <br /><br/>
  <?php
          // $result = $connect->query($query);
          // $total = mysqli_num_rows($result);
          // session_start();
          if(isset($_SESSION['id'])) {
            echo $_SESSION['id'];?>님 안녕하세요
          <br/>
  <?php
          }
          else {
        ?>  <button onclick="location.href='./login.php'">로그인</button>
          <br />
        <?php }
      ?>
  <div class=write_button>
    <button onClick="location.href='./cs-center_write.php'">글쓰기</button>
  </div>
  <!-- 질문리스트 -->
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
      <?php 
          $sql ="SELECT * FROM question_list";
          $result = $connect->query($sql);
          $total_record = mysqli_num_rows($result); 
          
          $list = 5; 
          $block_cnt = 5; 
          $block_num = ceil($page / $block_cnt); 
          $block_start = (($block_num - 1) * $block_cnt) + 1; // 블록의 시작 번호  ex) 1,6,11 ...
          $block_end = $block_start + $block_cnt - 1; // 블록의 마지막 번호 ex) 5,10,15 ...
          
          
          $total_page = ceil($total_record / $list);
          if($block_end > $total_page){ 
            $block_end = $total_page; 
          }
          $total_block = ceil($total_page / $block_cnt);
          $page_start = ($page - 1) * $list;
                  
                    /* 게시글 정보 가져오기  */
          $sql2 = "SELECT * FROM question_list ORDER BY number DESC LIMIT $page_start, $list";
          $result3 = $connect->query($sql2);
          ?>
      <tbody>
        <?php
            while($rows = mysqli_fetch_assoc($result3)){ //DB에 저장된 데이터 수 (열 기준)
                  if($total_record%2==0){
            ?> <tr class="even">
          <?php   }
                else{
            ?>
        <tr>
          <?php }
            if(empty($total_record)){
              $emptyData = '<tr><td class="textCenter" colspan="5">글이 존재하지 않습니다.</td></tr>';

	} else {?>
          <td width="50"><?php echo $total_record?></td>
          <td width="500"><?php
            if($rows['lock_post']=="1")
            { ?><a href='./action/secrete_action.php?number=<?php echo $rows["number"];?>'><?php echo $rows['title'];?>
            <i class="fas fa-lock"></i><?php
            }else{ ?>
            <a href="./cs-center_view.php?number=<?php echo $rows['number'];?>">
              <?php echo $rows['title'];}?></td>
          <td width="100"><?php echo $rows['id']?></td>
          <td width="200"><?php echo $rows['date']?></td>
          <td width="50"><?php echo $rows['hit']?></td>
        </tr>
        <?php
            $total_record--;
            }
          }
          ?>
      </tbody>
    </table>
  <div id="page_num" style="text-align: center;">
          <?php
            if ($page <= 1){
              // 빈 값
            } else {
              echo "<a href='cs-center.php?page=1'>처음</a>";
            }
            
            if ($page <= 1){
              // 빈 값
            } else {
              $pre = $page - 1;
              echo "<a href='cs-center.php?page=$pre'>◀ 이전 </a>";
              
            }
            
            for($i = $block_start; $i <= $block_end; $i++){
              if($page == $i){
                echo "<b> $i </b>";
              } else {
                echo "<a href='cs-center.php?page=$i'> $i </a>";
              }
            }
            
            if($page >= $total_page){
              // 빈 값
            } else {
              $next = $page + 1;
              echo "<a href='cs-center.php?page=$next'> 다음 ▶</a>";
            }
            
            if($page >= $total_page){
              // 빈 값
            } else {
              echo "<a href='cs-center.php?page=$total_page'>마지막</a>";
            }
        
        ?>
      </div>	
  </div>
  

  <!--  부트스트랩 js 사용 -->
  <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script> -->
</body>
</html>