<?php
  # db연결
    session_start();
    if(!isset($_SESSION['id'])){
      echo "<script>
      location.href='/board/freeboard.php';
        self.window.alert('로그인이 필요한 기능입니다.');
    </script>";
    }

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
        <title>Synergy 자유게시판</title>
    <link rel="shortcut icon" href="/img/pabi.ico">
    <link rel="stylesheet" type="text/css" href="/style3.css">
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
    <style> img{ width:30%; height:30%;} </style>
    <style>
.another_img {
    width: auto;
    height: auto;
}
</style>
    </head>

    <body>
      <!-- 상단 메뉴 -->
        <div id="bar">
          <div id="barin">
            <div id="sign"><a href="http://210.117.181.75/signup.html">SIGNUP</a></div>
            <div id="log"><a href="http://210.117.181.75/login.html">LOGIN</a></div>
        </div>

        <!-- 로고 글씨 검색 -->
        <div id="top">
          <div id="logo">
              <div id="lo1"><a href="http://210.117.181.75/index.php"><img class='another_img' src="/img/SYlogo.jpg" alt="로고"/></a></div>
              <div id="lo2"><a href="http://210.117.181.75/index.php"><img class='another_img' src="/img/SYlogo2.jpg" alt="로고"/></a></div>
          </div>
          <div id="write"><img  class='another_img' src="/img/write1.jpg" alt="로고"/><img class='another_img' src="/img/write2.jpg" alt="로고"/></div>
          <div id="search"><?php
            echo file_get_contents("/search2.txt");
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
        <div id="visit" style="width:800; height:445;">
        <!-- ****게시판 내용 나타나는 부분 **** -->
        <div id="board">
        <?php
            $tbname="freeboard_tb"; // 게시판 테이블
            $c_tbname="free_comment_tb"; // 댓글 테이블
            $num = $_GET['num'];
            $page = $_GET['page'];
            $query = "select *from $tbname where num = '$num'";
            $result = mysqli_query($conn, $query);
            $array = mysqli_fetch_array($result);
        ?>
             <div> <!-- 게시판 내용 아이디/날짜/조회수 -->
              <table width="100%">
                <tr>

                <?php
                echo "<td width=80>$array[id]</td>";
                echo "<th width=655>$array[title]</th>";
                echo "<td width=auto align='right'>$array[date]</td>";
                echo "<td width=auto align='right'>조회 : $array[view]</td>"; ?>
                </tr>
              </table>
              <br><br><br><br>

              <!--내용 !-->
                <div>
                <?php echo "$array[content]"; ?>
                <br><br><br>
                </div>
             </div>
    

              <div><!-- 댓글 보여주는 곳 -->
              </div>

              <div> <!--  목록으로 돌아가는 버튼 -->
                    <p align="right">
                        <input type="button" value="목록" onClick="location.href='http://210.117.181.75/board/freeboard.php?page=<?php echo$page;?>'">
                    </p>
              </div>
            </div><!-- board-->
          </div> <!-- visit -->
        </div><!-- cat -->
      </div><!-- menu -->
    </body>
</html>

