<?php
include "db_info.php";
$sql = "SELECT pass FROM freeboard_tb where id={$_GET['id']}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$filtered=array(
  'id'=> mysqli_real_escape_string($conn, $_POST['id'])
);
  if($_POST['pass']==$row['pass']){
    $query = "DELETE FROM freeboard_tb WHERE id={$filtered['id']}";
    $result= mysqli_query($conn,$query);
  header('Location: http://210.117.181.75/community.php?id=Freeboard');
  }
else{$msg="wrong password";
      echo "<script> alert('$msg');
      history.go(-1); </script>";
      exit;

  }

//header('Location: http://210.117.181.75/Board_ex2/list.php');
?>
