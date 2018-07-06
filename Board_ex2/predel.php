<?php
include "db_info.php";
$sql = "SELECT * FROM freeboard_tb where id={$_GET['id']}";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
  <body>
    <form action="done_del.php?id=<?=$_GET['id']?>" method="post">
          <input type="hidden" name="id" value="<?=$_GET['id']?>">
      비밀번호 : <input type="password" name="pass" size=4 maxlength=4>
      <input type=submit value="확 인">
      <input type=button value="취 소" onclick="history.back(-1)">
    </form>
  </body>
</html>
