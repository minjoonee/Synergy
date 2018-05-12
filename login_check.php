<?php
session_start();
$id = $_POST['id'];
$pw = $_POST['pw'];
$conn=mysqli_connect('localhost', 'root', '771029', 'login', '3306');
$db=mysqli_select_db($conn , "login");
$query = "select *from user where id = '$id'";
$result = mysqli_query($conn, $query);

$array = mysqli_fetch_array($result);
if($array['pw']==$pw){
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
 ?>
