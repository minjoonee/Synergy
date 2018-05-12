<!-- 방명록 쓰는 php -->
<?php
  session_start();
  if(!isset($_SESSION['id'])){
    echo "<script>history.back();
      self.window.alert('로그인이 필요한 기능입니다.');
    </script>";
  }

 $conn=mysqli_connect('localhost', 'root', '771029', 'board', '3306');
 $db=mysqli_select_db($conn , "board");
 $tablename = "guest_book";
  $db_id = $_SESSION['id'];
  $db_content = $_POST['content'];

  $sql = "INSERT into $tablename values(default,'$db_id','$db_content', default)";
  mysqli_query($conn, $sql);
  echo "<script>history.back();
    self.window.alert('글 작성 성공!');
  </script>";
?>
