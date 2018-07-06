<!--
게시글 수정 프로세스
1.소은지 -20180604
2.조민준 ~ 20180702
-->
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
    $page = $_GET['page'];
    $num = $_GET['num'];
    $user_id = $_SESSION['id'];
    $db_content = $_POST['content'];

    $conn=mysqli_connect('127.0.0.1', 'kwon', 'synergyit', 'synergy_db', '3306');
    mysqli_set_charset($conn, 'utf8');
    $query = "select *from welcome_tb where num = '$num'";

    $result = mysqli_query($conn, $query);
    $array = mysqli_fetch_array($result);

    if($user_id != $array[id]){
        echo "<script>
        location.href='Home.php?page=$page';
        self.window.alert('$array[id]님 작성하신 글만 수정 가능합니다.');
        </script>";
    }
    else{
        $query = "UPDATE welcome_tb set content='$db_content' where num=$num";
        $result = mysqli_query($conn, $query);
        echo "<script>
        location.href='Home.php?page=$page';
        self.window.alert('수정 완료!');
        </script>";
    }
    //echo $query;
//header('Location: http://210.117.181.75/Board_ex2/list.php');
?>
