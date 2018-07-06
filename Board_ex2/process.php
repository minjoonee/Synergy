<!--
게시글 작성 프로세스
1.소은지 -20180604
-->
<?php
include "db_info.php";
$sql = "INSERT INTO freeboard_tb (title,description,author,created,pass) VALUES('{$_POST['title']}', '{$_POST['description']}', '{$_POST['author']}', now(),'{$_POST['pass']}')";

$result = mysqli_query($conn, $sql);
header('Location: http://210.117.181.75/community.php?id=Freeboard');
?>
