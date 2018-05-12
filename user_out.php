<?php
$conn=mysqli_connect('localhost', 'root', '771029', 'login', '3306');
$db=mysqli_select_db($conn , "login");
session_start();
$id = $_SESSION['id'];

$query = "delete from user where id = '$id';";
$result = mysqli_query($conn, $query);
$res = session_destroy();

echo "<script>
self.window.alert('회원 탈퇴하셨습니다.');
location.href = 'Home.php';
</script>";

 ?>
