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
     <link rel="shortcut icon" href="/img/pabi.ico">
    <link rel="stylesheet" type="text/css" href="Home_style3.css">
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
    <style type="text/css">
    body{
        font-family:Arial, Helvetica, sans-serif;
        margin:0 auto;
}
a:link {
        color: #666;
        font-weight: bold;
        text-decoration:none;
}
a:visited {
        color: #666;
        font-weight:bold;
        text-decoration:none;
}
a:active,
a:hover {
        color: #bd5a35;
        text-decoration:underline;
}


table a:link {
        color: #666;
        font-weight: bold;
        text-decoration:none;
}
table a:visited {
        color: #999999;
        font-weight:bold;
        text-decoration:none;
}
table a:active,
table a:hover {
        color: #bd5a35;
        text-decoration:underline;
}
table {
        font-family:Arial, Helvetica, sans-serif;
        color:#666;
        font-size:12px;
        text-shadow: 1px 1px 0px #fff;
        background:#eaebec;
        margin:20px;
        border:#ccc 1px solid;

        -moz-border-radius:3px;
        -webkit-border-radius:3px;
        border-radius:3px;

        -moz-box-shadow: 0 1px 2px #d1d1d1;
        -webkit-box-shadow: 0 1px 2px #d1d1d1;
        box-shadow: 0 1px 2px #d1d1d1;
}
table th {
        padding:15px;
        border-top:1px solid #fafafa;
        border-bottom:1px solid #e0e0e0;

        background: #ededed;
        background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
        background: -moz-linear-gradient(top,  #ededed,  #ebebeb);
}
table th:first-child{
        text-align: left;
        padding-left:20px;
}
table tr:first-child th:first-child{
        -moz-border-radius-topleft:3px;
        -webkit-border-top-left-radius:3px;
        border-top-left-radius:3px;
}
table tr:first-child th:last-child{
        -moz-border-radius-topright:3px;
        -webkit-border-top-right-radius:3px;
        border-top-right-radius:3px;
}
table tr{
        text-align: center;
        padding-left:20px;
}
table tr td:first-child{
        text-align: left;
        padding-left:20px;
        border-left: 0;
}
table tr td {
        padding:12px;
        border-top: 1px solid #ffffff;
        border-bottom:1px solid #e0e0e0;
        border-left: 1px solid #e0e0e0;

        background: #fafafa;
        background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
        background: -moz-linear-gradient(top,  #fbfbfb,  #fafafa);
}
table tr.even td{
        background: #f6f6f6;
        background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6));
        background: -moz-linear-gradient(top,  #f8f8f8,  #f6f6f6);
}
table tr:last-child td{
        border-bottom:0;
}
table tr:last-child td:first-child{
        -moz-border-radius-bottomleft:3px;
        -webkit-border-bottom-left-radius:3px;
        border-bottom-left-radius:3px;
}
table tr:last-child td:last-child{
        -moz-border-radius-bottomright:3px;
        -webkit-border-bottom-right-radius:3px;
        border-bottom-right-radius:3px;
}
table tr:hover td{
        background: #f2f2f2;
        background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
        background: -moz-linear-gradient(top,  #f2f2f2,  #f0f0f0);
}
form.button{
   width: 0%;
}
    </style>
  </head>
  <body>
  <!-- 상단 메뉴 -->
  <div id="bar">
    <div id="barin">
     <?php
     if(!isset($_SESSION['id'])){
      echo "<div id='sign'><a href='http://210.117.181.75/signup.html'>SIGNUP</a></div>";
      echo "<div id='log'><a href='http://210.117.181.75/login.html'>LOGIN</a></div>";
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
        <div id="lo1">
            <a href="index.php">
            <img src="/img/SYlogo.jpg" alt="로고"/>
        </div>
         <div id="lo2">
            <a href="index.php">
            <img src="/img/SYlogo2.jpg" alt="로고"/>
         </div>
      </div>
      <div id="write">
         <img src="/img/write1.jpg" alt="로고"/>
         <img src="/img/write2.jpg" alt="로고"/>
      </div>
      <div id="search"><?php
            echo file_get_contents("search2.txt");
          ?>
      </div>
   </div>


        <!-- 메뉴 공지사항 방명록 사진-->


      <div id="menu">
            <div id="menuin"><?php
              echo file_get_contents("menu.txt");
            ?>
            </div>
       </div>
    
    <table style="margin-left: auto; margin-right: auto;">
      <tr>
        <th>아이디</th>
        <?php echo"<td>$user_id</td>";?>
      </tr>

      <tr>
        <th>이름</th>
        <?php echo"<td>$array[name]</td>";?>
      </tr>
      <tr>
        <th>학번</th>
        <?php echo"<td>$array[student_id]</td>";?>
      </tr>
      <tr>
        <th>가입 동기</th>
        <?php echo"<td>$array[motivate]</td>";?>
      </tr>
    </table>
    <form class="button" action="user_out.php" method="post">
      <input type="submit" value="회원탈퇴">
    </form>
    <form class="button" action="index.php" method="post">
     <input type="submit" value="메인으로">
    </form>
    <!--링크-->
        <div id="link">
          <div id="chon" ><a href="http://jbnu.ac.kr/kor/" target="_blank"><img src="/img/chon.jpg" alt="전북로고"/></a></div>
          <div id="it"><a href="https://it.jbnu.ac.kr/itjbnu/2016/inner.php?sMenu=main" target="_blank"><img src="/img/it.jpg" alt="it로고"/></a></div>
          <div id="lic"><a href="https://lincplus.jbnu.ac.kr/" target="_blank"><img src="/img/lic.jpg" alt="linc로고"/></a></div>
        </div>
        <div id="member">
            소은지 조민준 주권능 양지원 이범원 최대원 윤민성 송준원
        </div>
  </body>
</html>
