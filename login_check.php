<?php
session_start();
$id = $_POST['id'];
$pw = $_POST['pw'];
$conn=mysqli_connect('127.0.0.1', 'kwon', 'synergyit', 'synergy_db', '3306');
if(!$conn){
     echo"connect fail....";
}
mysqli_set_charset($conn, 'utf8');

if(!$id || !$pw){
    echo "<script>history.back();
    self.window.alert('아이디를 입력해주세요.');
    </script>";
}
else{
    $db=mysqli_select_db($conn , "synergy_db");
    $query = "select *from info_tb where id = '$id'";
    $result = mysqli_query($conn, $query);

    $array = mysqli_fetch_array($result);
    if($array['pass']==$pw){
        $_SESSION['id']= $id;
        if(isset($_SESSION['id'])){
        echo "<script>
        self.window.alert('로그인 성공!');
        location.href = 'Home.php';
        </script>";
        }
        else if(!isset($_SESSION['id'])){
            echo "<script>history.back();
            self.window.alert('세션저장 실패');
            </script>";
        }
        else{
            echo "<script>history.back();
            self.window.alert('비밀번호를 확인해주세요');
            </script>";
        }
    }
    else{
        echo "<script>history.back();
        self.window.alert('아이디를 확인해주세요');
    </script>";
    }
}
 ?>
