<!--
게시글 내용 보기
1.소은지 -20180604
-->
<?php //db다룸
include "db_info.php";
$result = mysqli_query($conn, "SELECT * FROM freeboard_tb");
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <h1> 자유게시판</h1>
</head>

<body>
  <article>
  <?php
  if(isset($_GET['id'])) { //get해오는 id가 있으면
      $sql = "SELECT * FROM freeboard_tb WHERE id={$_GET['id']}"; //freeboad 로부터 id에 맞는 모든 * 값을 가져옴
      $result = mysqli_query($conn, $sql); //가져온값을 query문으로 result에 넣고
      $row = mysqli_fetch_array($result); //result를 array로 만들어 row에 넣는다.
      echo '<h2>'.$row['title'].'</h2>'; //row의 title출력
      echo '<h3> 작성자:'.$row['author'].'</h3><br>';//row의 author 출력
      echo $row['description']."<br>"; //row의 description 출력
      echo '<br>'; //줄 내림
  }
  ?>
  <!-- id값을 전달하여 링크 이동 -->
<a href="http://210.117.181.75/community.php?id=<?=$_GET['id']?>">목록보기</a>

<a href="edit.php?id=<?=$_GET['id']?>">수정</a>

<a href="predel.php?id=<?=$_GET['id']?>">삭제</a>

  </article>
</body>
</html>
