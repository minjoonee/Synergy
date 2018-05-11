<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">

   <title>SYNERGY</title>
   <link rel=" shortcut icon" href="a.ico">
   <link rel="icon" href="a.ico">
   <link rel="stylesheet" type="text/css" href="http://localhost/synergy/NewCSS.css">
</head>
<body>
    <header>
        <a href="http://localhost/synergy/Home.php"><img id="logo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQY59s12KOqbtvE8Rzk9FqdW1rv2LZYnxdKLg5sZYjPYGCJamL9" /></a>
        <?php
          echo file_get_contents("search.txt")
         ?>
    </header>
    <nav id="cnav1">
        <ol>
        <li><a href="http://localhost/synergy/Home.php">HOME</a></li>
        <li><a href="http://localhost/synergy/Home_Introduce.php?id=9">INTRODUCE</a></li>
        <li><a href="http://localhost/synergy/Home_Project.php?id=10">PROJECT</a></li>
        <li><a href="http://localhost/synergy/Home_Community.php?id=11">COMMUNITY</a></li>
      </ol>
    </nav>
    <div class="pic">pic</div>
    <div class="notice">
      <div style = "position:absolute; height:500px;">
           <div style= "position:absolute; overflow:hidden; width:800px; height:480px;">
             <div style ="position:absolute; left:100px; top:-280px;">
               <iframe src="https://it.jbnu.ac.kr/itjbnu/2016/inner.php?sMenu=G1000" width="550" height="690" scrolling="no"></iframe>
             </div>
           </div>
         </div>
    </div>
    <div class="img">
      <img id="com" src="http://ppss.kr/wp-content/uploads/2017/12/006-9.jpg" />
    </div>
  <div class="button">
      <a href="https://jbnu.ac.kr/kor/" target="_blank"><img id="jbnu" src="https://www.jbnu.ac.kr/kor/images/logo.png"/></a>
      <a href="https://it.jbnu.ac.kr/itjbnu/2016/inner.php?sMenu=main" target="_blank"><img id="IT" src="https://it.jbnu.ac.kr/itjbnu/2016/img/logoTop.png"/></a>
      <a href="http://ck.jbnu.ac.kr/?from=mobile" target="_blank"><img id="CK" src="http://ck.jbnu.ac.kr/images/common/logo.gif"/></a>
  </div>
</body>
</html>
