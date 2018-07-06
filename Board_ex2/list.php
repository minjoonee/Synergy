<!--
�Խñ� ���� ����
1.������ -20180604

#�ش� �������� ����� ���� ���� �������� �κ��Դϴ�.
view.php write.php edit.php ���� css�� html�� style�� �־��ּ���.
-->
<?php //db�ٷ�
include "db_info.php";
$sql = "SELECT * FROM freeboard_ex";
$result = mysqli_query($conn, $sql);

$list = '';
while($row = mysqli_fetch_array($result)){
  $list = $list."<li><a href=\"http://210.117.181.75/Board_ex2/view.php?id={$row['id']}\">{$row['title']}</a></li>";
}
?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <!-- �ش� �������� ����� ���� ���� �������� �κ��Դϴ�. �׷��� �ϴ� list.php���� ������ css�� �־����ϴ�. -->

</head>

  <article>
    <body >
          <!-- list �������� ������ �����ش�. -->
      <ol>
        <?=$list?>
      </ol>

      <div>
        <a href="http://210.117.181.75/Board_ex2/write.php">write</a>
      </div>

  </article>
</body>
</html>
