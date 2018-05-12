<?php
    session_start();
    if(!isset($_SESSION['id'])){
      echo "<script>
      location.href='Home.php';
    self.window.alert('관리자만 가능한 기능입니다.');
    </script>";
    }
//스크립트 중복 안되게 끊어줌
?>


<?php
//삭제 query 문 : DELETE FROM `guest_book` WHERE `guest_book`.`idx` = 6;
    $id_check = $_SESSION['id'];
    if($id_check!='admin'){
      echo "<script>
      location.href='Home.php';
    self.window.alert('관리자만 가능한 기능입니다.');
    </script>";
    }
   $conn=mysqli_connect('localhost', 'root', '771029', 'board', '3306');
   $db=mysqli_select_db($conn , "board");
   $tablename = "guest_book";
   $idx = $_GET['id'];
   $query = "DELETE FROM $tablename where idx=$idx";
   $result = mysqli_query($conn, $query);
   echo "<script>
   location.href='Home.php';
 self.window.alert('글 삭제 완료.');
 </script>";

 ?>
