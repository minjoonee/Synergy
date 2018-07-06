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

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Synergy 자유게시판</title>
    <link rel="shortcut icon" href="/img/pabi.ico">
    <link rel="stylesheet" type="text/css" href="/style3.css">
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
<script src="https://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
<script type="text/javascript">
function saveContent() {
    Editor.save(); // 이 함수를 호출하여 글을 등록하면 된다.
}
</script>
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
              <div id="lo1"><a href="http://210.117.181.75/index.php"><img src="/img/SYlogo.jpg" alt="로고"/></a></div>
              <div id="lo2"><a href="http://210.117.181.75/index.php"><img src="/img/SYlogo2.jpg" alt="로고"/></a></div>
          </div>
          <div id="write"><img src="/img/write1.jpg" alt="로고"/><img src="/img/write2.jpg" alt="로고"/></div>
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
            $page= $_GET['page'];
            $query = "select *from $tbname where num = '$num'";
            $result = mysqli_query($conn, $query);
            $array = mysqli_fetch_array($result);
        ?>
            <div id="title" align="center">
                <?php echo "$array[title]";?>
            </div>
             <div> <!-- 게시판 내용 아이디/날짜/조회수 -->
               <!-- 여기에 수정하는 테이블 작성 -->
        <form name="tx_editor_form" id="tx_editor_form" action="/board/freeboard_upload.php" method="post" enctype="multipart/form-data" accept-charset="utf-8" align="center">
제목:<input type="text" id="title" name="title" style="width:680px;"/>
            <div style="height:10px;"></div>
            <div style="width:750px;">
        <?php
            include_once ("/var/www/html/board/editor/daumEditor/editor.html");      // 다음 에디터를 include 한다.
            ?>
        <div align="right">
            <input type="button" value="등록" onClick="saveContent();"/>
            <input type="button" value="목록" onClick="location.href='http://210.117.181.75/board/freeboard.php?page=<?php echo$page;?>'"></div>
        </div>
</form>

             </div>

            </div><!-- board-->
          </div> <!-- visit -->
        </div><!-- cat -->
      </div><!-- menu -->

</form>
</body>
</html>

