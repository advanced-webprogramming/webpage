<!DOCTYPE html>
<html lang="en">

<head>
  <title>라임 오렌지 1:1 질문</title>
  <?php include_once "./fragment/head.php";?>
  <link href="css/style_cs_view.css" rel="stylesheet" />
  <link href="css/header.css" rel="stylesheet" />
</head>

<body>
<?php include_once "./fragment/header.php";?>

<!-- 질문내용 -->
  <div class="container">
    <form method="POST">
    <?php
          $connect =mysqli_connect('localhost', 'root', 'password', 'lime_orange');
          $number = $_GET['number'];
          session_start();
          $query = "SELECT * FROM question_list WHERE number=$number";
          $result = $connect->query($query);
          $rows = mysqli_fetch_assoc($result);
          
          $hit = "UPDATE question_list SET hit=hit+1 WHERE number=$number";
          $connect->query($hit);

        ?>
      <div id="board_read">
        <h2><?php echo $rows['title']; ?></h2>
          <div id="user_info">
            <?php echo $rows['id']; ?> <?php echo $rows['date']; ?> 조회:<?php echo $rows['hit']; ?>
              <div id="bo_line"></div>
            </div>
            <div id="bo_content">
              <?php echo nl2br("$rows[content]"); ?>
            </div>
        <!-- 목록, 수정, 삭제 -->
        <div id="bo_ser">
          <ul>
            <li><a href="cs-center.php">목록으로</a></li>
            <li><a href="cs-center_edit.php?number=<?php echo $rows['number']; ?>">수정</a></li>
            <li><a href="delete_action.php?number=<?php echo $rows['number']; ?>">삭제</a></li>
          </ul>
        </div>
      </div>
          
    </form>
  </div>
</body>

</html>