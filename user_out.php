<?php
session_start();
$conn=mysqli_connect('127.0.0.1', 'kwon', 'synergyit', 'synergy_db', '3306');
if(!$conn){
  echo"connect fail....";
}
mysqli_set_charset($conn, 'utf8');
$db=mysqli_select_db($conn , "synergy_db");
$id = $_SESSION['id'];

$query = "delete from info_tb where id = '$id'";
$result = mysqli_query($conn, $query);
$res = session_destroy();

echo "<script>
self.window.alert('회원 탈퇴하셨습니다.');
location.href = 'Home.php';
</script>";

 ?>
