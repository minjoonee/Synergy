
<?php
  # db연결
    session_start();
   $conn=mysqli_connect('127.0.0.1', 'kwon', 'synergyit', 'synergy_db', '3306');
   if(!$conn){
     echo"connect fail....";
   }
    mysqli_set_charset($conn, 'utf8');

   $db=mysqli_select_db($conn , "synergy_db");
?>


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
        <?php
          if(!isset($_SESSION['id'])){
            echo "<div id='sign'><a href='http://210.117.181.75/signup.html'>SIGNUP</a></div>";
            echo "<div id='log'><a href='http://210.117.181.75/login.php'>LOGIN</a></div>";
          }
          else{
              echo "<div id='sign'><a href='http://210.117.181.75/info.php'>INFO</a>    </div>";
              echo "<div id='log'><a href='http://210.117.181.75/logout.php'>LOGOUT</a></div>";
          }
        ?>
          </div>
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
              echo file_get_contents("community.txt");
              ?>
          </div>
        <div id="catright">
         <h2>자유롭게 게시글을 쓸 수 있는 공간입니다. 사이드 메뉴를 이용해주세요
	</div>
    </body>
</html>
