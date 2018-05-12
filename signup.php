<?php
$log_id = $_POST['id'];
$log_pw = $_POST['pw'];
$log_pwc = $_POST['pwc'];
$log_name = $_POST['name'];
$log_email = $_POST['email'];
$log_content = $_POST['content'];

if(!$log_id){
  echo "<script>history.back();
    self.window.alert('아이디를 입력해주세요.');
  </script>";
}
else if(!$log_pw){
  echo "<script>history.back();
    self.window.alert('비밀번호를 입력해주세요.');
  </script>";
}
else if(!$log_pwc || $log_pw!=$log_pwc){
  echo "<script>history.back();
    self.window.alert('비밀번호를 다시 확인해주세요.');
  </script>";
}
else if(!$log_name){
  echo "<script>history.back();
    self.window.alert('이름을 입력해주세요.');
  </script>";
}
else if(!$log_email){
  echo "<script>history.back();
    self.window.alert('이메일을 입력해주세요.');
  </script>";
}
else if(!$log_content){
  echo "<script>history.back();
    self.window.alert('회원가입 동기를 입력해주세요.');
  </script>";
}
$conn=mysqli_connect('localhost', 'root', '771029', 'login', '3306');
$db=mysqli_select_db($conn , "login");
$check = "select count(*) from user where id ='$log_id'";
$result = mysqli_query($conn, $check);
$row = mysqli_fetch_row($result);
if($row[0]>0)
{
    echo "<script>history.back();
    self.window.alert('중복된 아이디입니다.');
  </script>";
}
else{
  $sql = "INSERT into user values('$log_id','$log_pw','$log_name','$log_email','$log_content')";
  mysqli_query($conn, $sql);
  echo "<script>
  self.window.alert('회원가입 성공!');
  location.href = 'login.html';
  </script>";
}
?>
