<?php
$conn=mysqli_connect('localhost', 'root', '771029', 'login', '3306');
$db=mysqli_select_db($conn , "login");

session_start();
$user_id = $_SESSION['id'];

$query = "select *from user where id = '$user_id'";
$result = mysqli_query($conn, $query);
$array = mysqli_fetch_array($result);
 ?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table border=1 bordercolordark=white bordercolorlight=#999999>
      <tr>
        <td>아이디</td>
        <?php echo"<td>$user_id</td>";?>
      </tr>

      <tr><?php echo"
        <td>이름</td>
        <td>$array[name]</td>";?>
      </tr>
      <tr>
        <td>이메일</td>
        <?php echo"<td>$array[email]</td>";?>
      </tr>
      <tr>
        <td>가입 동기</td>
        <?php echo"<td>$array[content]</td>";?>
      </tr>
    </table>
    <form class="" action="log_main.php" method="post"><br>
      <input type="submit" value="메인으로">
    </form>

    <form class="" action="user_out.php" method="post"><br>
      <input type="submit" value="회원탈퇴">
    </form>

  </body>
</html>
