<?php
    session_start();
    if(!isset($_SESSION['id'])){
      echo "<script>
      location.href='Home.php';
    self.window.alert('로그인이 필요한 기능입니다.');
    </script>";
    }
//스크립트 중복 안되게 끊어줌
?>


<?php
//삭제 query 문 : DELETE FROM `welcome_tb` WHERE `num` = 6;
    $num = $_GET['num'];
    $user_id = $_SESSION['id'];
   $conn=mysqli_connect('127.0.0.1', 'kwon', 'synergyit', 'synergy_db', '3306');
    mysqli_set_charset($conn, 'utf8');
    $query = "select *from welcome_tb where num = '$num'";
    $result = mysqli_query($conn, $query);
    $array = mysqli_fetch_array($result);

    if($user_id == $array[id]){
        $db=mysqli_select_db($conn , "synergy_db");
        $tablename = "welcome_tb";
        $query = "DELETE FROM $tablename where num=$num";
        $result = mysqli_query($conn, $query);
        echo "<script>
            location.href='Home.php';
            self.window.alert('글 삭제 완료.');
        </script>";
    }
    else{
        echo "<script>
            location.href='Home.php';
            self.window.alert('$user_id 님 작성하신 글만 삭제 가능합니다.');
        </script>";
    }

 ?>
