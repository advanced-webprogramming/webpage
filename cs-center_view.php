<!DOCTYPE html>
<html lang="en">

<head>
  <title>라임 오렌지 1:1 질문</title>
  <?php include_once "./fragment/head.php";?>
  <link href="style_main-home.css" rel="stylesheet" />
</head>

<body>
<?php include_once "./fragment/header.php";?>

<!-- 질문내용 -->
  <div class="container">
    <h2></h2>
    <p></p>
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
      <table class="view_table" align=center>
        <tr>
          <td colspan="4" class="view_title"><?php echo $rows['title']?></td>
          </tr>
        <tr>
        <td class="view_id">작성자</td>
        <td class="view_id2"><?php echo $rows['id']?></td>
        <td class="view_hit">조회수</td>
        <td class="view_hit2"><?php echo $rows['hit']?></td>
        </tr>

        <tr>
          <td colspan="4" class="view_content" valign="top">
          <?php echo $rows['conent']?></td>
        </tr>
        </table>

        <!-- MODIFY & DELETE -->
        <div class="view_btn">
          <button class="view_btn1" onclick="location.href='./cs-center.php'">목록으로</button>
          <button class="view_btn1" onclick="location.href='./cs-cener_edit.php?number=<?=$number?>&id=<?=$_SESSION['userid']?>'">수정</button>

          <button class="view_btn1" onclick="location.href='./delete_action.php?number=<?=$number?>&id=<?=$_SESSION['userid']?>'">삭제</button>
        </div>


    </form>
  </div>
</body>

</html>