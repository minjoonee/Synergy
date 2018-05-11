<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="http://localhost/synergy/Homestyle.css">
  <title>타이틀을 입력하세요</title>
</head>
<body>
  <header>
    <a href="http://localhost/synergy/Home.php"><img id="logo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQY59s12KOqbtvE8Rzk9FqdW1rv2LZYnxdKLg5sZYjPYGCJamL9" /></a>
    <?php
      echo file_get_contents("search.txt");
     ?>
  </header>
  <nav id="cnav1">
    <ol>
    <?php
      echo file_get_contents("list.txt");
    ?>
    </ol>
  </nav>
  <nav id="cnav2">
    <ol>
    <?php
      echo file_get_contents("category_Introduce.txt");
    ?>
    </ol>
  </nav>
  <article>
    <?php
      echo file_get_contents($_GET['id'].".txt");
    ?>
  </article>
</body>
</html>
