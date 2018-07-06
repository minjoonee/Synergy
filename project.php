<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <title>Introduce</title>
    <link rel="shortcut icon" href="/img/pabi.ico">
    <link rel="stylesheet" type="text/css" href="style3.css">
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
    </head>

    <body>
      <!-- 상단 메뉴 -->
        <div id="bar">
          <div id="barin">
            <div id="sign"><a href="http://210.117.181.75/signup.html">SIGNUP</a></div>
            <div id="log"><a href="http://210.117.181.75/login.php">LOGIN</a></div>
        </div>

        <!-- 로고 글씨 검색 -->
        <div id="top">
          <div id="logo">
              <div id="lo1"><a href="http://210.117.181.75/Home.php"><img src="/img/SYlogo.jpg" alt="로고"/></a></div>
              <div id="lo2"><a href="http://210.117.181.75/Home.php"><img src="/img/SYlogo2.jpg" alt="로고"/></a></div>
          </div>
          <div id="write"><img src="/img/write1.jpg" alt="로고"/><img src="/img/write2.jpg" alt="로고"/></div>
          <div id="search"><?php
            echo file_get_contents("search2.txt");
          ?>
          </div>
        </div>

        <!-- 메뉴-->
        <div id="menu">
          <div id="menuin"><?php
            echo file_get_contents("menu.txt");
          ?>
          </div>

        <!--메뉴아래-카테고리-->
        <div id="cat">
          <div id="catleft">
              <?php
              echo file_get_contents("project.txt");
              ?>
          </div>
          <div id="catright">
	  <?php
      echo file_get_contents($_GET['id'].".txt");
    ?>
	</div>
        <div>



    </body>
</html>
