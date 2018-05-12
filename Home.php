<?php
    session_start();
   $conn=mysqli_connect('localhost', 'root', '771029', 'board', '3306');
   $db=mysqli_select_db($conn , "board");
   $tablename = "guest_book";
?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">

   <title>SYNERGY</title>
   <link rel=" shortcut icon" href="a.ico">
   <link rel="icon" href="a.ico">
   <link rel="stylesheet" type="text/css" href="NewCSS.css">
</head>
<body>

  <!-- 로그인, 회원가입 , 화원 아이디
    로그인 안했을 시 로그인창 안뜸.
    로그인 시 로그아웃 창 뜸.
    !-->
  <div class="login">
    <?php
      if(!isset($_SESSION['id']))
      {
        echo "<a href='login.html'>로그인</a>
        <a href='signup.html'>회원가입</a>";
      }
      if(isset($_SESSION['id']))
      {
        $check_id = $_SESSION['id'];
        echo
        "$check_id<br>";
        echo "<a href='logout.php'>로그아웃</a>
        <a href='info.php'>회원정보</a>";
      }
      ?>
  </div>


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


    <!-- 방명록 보여주는 곳-->
    <div class="">
        <?php
       $query = "select * from $tablename";
       $result = mysqli_query($conn, $query);
         ?>
         <table>
         <tr>
             <td width=60 bgcolor=#CCCCCC>
                 <p align=center>아이디</p>
             </td>
             <td width=400 bgcolor=#CCCCCC>
                 <p align=center>내용</p>
             </td>
             <td width=150 bgcolor=#CCCCCC>
                 <p align=center>날짜</p>
             </td>
         </tr>
         <?php // 디비에 있는 자료 목록
         // 삭제기능도 추가, 수정은 아직...
           while ($array = mysqli_fetch_array($result)) {
             // code...

               echo "
                 <tr>
                    <td width=60>
                        <p align=center>$array[id]</p>
                    </td>
                    <td width=400>
                        <p align=center>$array[content]</p>
                    </td>
                    <td width=150>
                        <p align=center>$array[date]</p>
                    </td>
                    <td width=60>
                      <a href='Guest_book_delete.php?id=$array[idx]'>삭제</a>
                      </td>
                </tr>
                   ";
           }
            ?>
      </table>
    </div>

<!-- 방명록 쓰기 -->
    <div class="">
      <form class="" action="Guest_book_write.php"  method="post">
      <textarea name="content" maxlength=500 style="margin: 0px; width: 409px; height: 38px;"></textarea>
          <input type="submit" value="글쓰기"><br>
      </form>
    </div>


  <div class="button">
      <a href="https://jbnu.ac.kr/kor/" target="_blank"><img id="jbnu" src="https://www.jbnu.ac.kr/kor/images/logo.png"/></a>
      <a href="https://it.jbnu.ac.kr/itjbnu/2016/inner.php?sMenu=main" target="_blank"><img id="IT" src="https://it.jbnu.ac.kr/itjbnu/2016/img/logoTop.png"/></a>
      <a href="http://ck.jbnu.ac.kr/?from=mobile" target="_blank"><img id="CK" src="http://ck.jbnu.ac.kr/images/common/logo.gif"/></a>
  </div>
</body>
</html>
