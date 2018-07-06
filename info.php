<?php
$conn=mysqli_connect('127.0.0.1', 'kwon', 'synergyit', 'synergy_db', '3306');
mysqli_set_charset($conn, 'utf8');
$db=mysqli_select_db($conn , "synergy_db");

session_start();
$user_id = $_SESSION['id'];

$query = "select *from info_tb where id = '$user_id'";
$result = mysqli_query($conn, $query);
$array = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>시너지</title>
  </head>
  <body>
    <table border=1 bordercolordark=white bordercolorlight=#999999>
      <tr>
        <td>아이디</td>
        <?php echo"<td>$user_id</td>";?>
      </tr>

      <tr>
        <td>이름</td>
        <?php echo"<td>$array[name]</td>";?>
      </tr>
      <tr>
        <td>학번</td>
        <?php echo"<td>$array[student_id]</td>";?>
      </tr>
      <tr>
        <td>가입 동기</td>
        <?php echo"<td>$array[motivate]</td>";?>
      </tr>
    </table>
    <form class="" action="Home.php" method="post"><br>
      <input type="submit" value="메인으로">
    </form>

    <form class="" action="user_out.php" method="post"><br>
      <input type="submit" value="회원탈퇴">
    </form>
  </body>
</html>
