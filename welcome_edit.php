<!DOCTYPE html>
<?php
    session_start();
    if(!isset($_SESSION['id'])){
      echo "<script>
      location.href='Home.php';
        self.window.alert('로그인이 필요한 기능입니다.');
    </script>";
    }
//스크립트 중복 안되게 끊어줌
?>

<?php
    $page = $_GET['page'];
    $num = $_GET['num'];
    $user_id = $_SESSION['id'];
    $conn=mysqli_connect('127.0.0.1', 'kwon', 'synergyit', 'synergy_db', '3306');
    mysqli_set_charset($conn, 'utf8');
    $query = "select *from welcome_tb where num = '$num'";
    $result = mysqli_query($conn, $query);
    $array = mysqli_fetch_array($result);
    if($user_id != $array[id]){
        echo "<script>
            location.href='Home.php?page=$page';
            self.window.alert('$user_id 님 작성하신 글만 수정 가능합니다.');
        </script>";
    }
?>

<html lang="ko">
    <head>
        <meta charset="utf-8">
        <title>시너지</title>
    <link rel="shortcut icon" href="/img/pabi.ico">
    <link rel="stylesheet" type="text/css" href="Home_style3.css">
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
    <style type="text/css">
    .form-style{
    max-width: 400px;
    font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
form-style label{
    display:block;
    margin-bottom: 10px;
}
.form-style label > span{
    float: left;
    width: 100px;
    color: #F072A9;
    font-weight: bold;
    font-size: 13px;
    text-shadow: 1px 1px 1px #fff;
}
.form-style fieldset{
    border-radius: 10px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    margin: 50px 0px 0px 100px;
    border: 1px solid #FFD2D2;
    padding: 30px;
    background: #FFF4F4;
    box-shadow: inset 0px 0px 15px #FFE5E5;
    -moz-box-shadow: inset 0px 0px 15px #FFE5E5;
    -webkit-box-shadow: inset 0px 0px 15px #FFE5E5;
}
.form-style fieldset legend{
    color: #FFA0C9;
    border-top: 1px solid #FFD2D2;
    border-left: 1px solid #FFD2D2;
    border-right: 1px solid #FFD2D2;
    border-radius: 5px 5px 0px 0px;
    -webkit-border-radius: 5px 5px 0px 0px;
    -moz-border-radius: 5px 5px 0px 0px;
    background: #FFF4F4;
    padding: 0px 8px 3px 8px;
    box-shadow: -0px -1px 2px #F1F1F1;
    -moz-box-shadow:-0px -1px 2px #F1F1F1;
    -webkit-box-shadow:-0px -1px 2px #F1F1F1;
    font-weight: normal;
    font-size: 12px;
}
.form-style textarea{
    width:280px;
    height:100px;
}
.form-style input[type=text],
.form-style input[type=date],
.form-style input[type=datetime],
.form-style input[type=number],
.form-style input[type=search],
.form-style input[type=time],
.form-style input[type=url],
.form-style input[type=email],
.form-style select,
.form-style textarea{
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border: 1px solid #FFC2DC;
    outline: none;
    color: #F072A9;
    box-shadow: inset 1px 1px 4px #FFD5E7;
    -moz-box-shadow: inset 1px 1px 4px #FFD5E7;
    -webkit-box-shadow: inset 1px 1px 4px #FFD5E7;
    background: #FFEFF6;
    width:30%;

    margin-left: 30px;
    margin-right: 10px;
    padding-right: 100px;
    padding-left: 5px;
    border-left-width: 1px;
    border-right-width: 1px;

}
.form-style  input[type=submit],
.form-style  input[type=button]{
    background: #EB3B88;
    border: 1px solid #C94A81;
    padding: 5px 15px 5px 15px;
    color: #FFCBE2;
    box-shadow: inset -1px -1px 3px #FF62A7;
    -moz-box-shadow: inset -1px -1px 3px #FF62A7;
    -webkit-box-shadow: inset -1px -1px 3px #FF62A7;
    border-radius: 3px;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    font-weight: bold;
}
.required{
    color:red;
    font-weight:normal;
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
              <div id="lo1"><a href="Home.php"><img src="/img/SYlogo.jpg" alt="로고"/></div>
              <div id="lo2"><a href="Home.php"><img src="/img/SYlogo2.jpg" alt="로고"/></div>
          </div>
          <div id="write"><img src="/img/write1.jpg" alt="로고"/><img src="/img/write2.jpg" alt="로고"/></div>
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

          <!-- ******** edit fome ********** -->
          <div class = "form-style">
            <?php echo"<form action = 'welcome_update.php?page=$page&num=$num' method='post'>";?>

            <fieldset><legend>edit</legend>
            <label for="field">
            <textarea name="content" class="textarea-field"></textarea></label>
<label><span>&nbsp;</span>
            <p><input type="submit" value="수정" /></label>
            <input type="button" value="취소" onclick ="history.back(-1)">
</fieldset>
            </form>
          </div>

        <!--링크-->
        <div id="link">
          <div id="chon" ><a href="http://jbnu.ac.kr/kor/" target="_blank"><img src="/img/chon.jpg" alt="전북로고"/></a></div>
          <div id="it"><a href="https://it.jbnu.ac.kr/itjbnu/2016/inner.php?sMenu=main" target="_blank"><img src="/img/it.jpg" alt="it로고"/></a></div>
          <div id="lic"><a href="https://lincplus.jbnu.ac.kr/" target="_blank"><img src="/img/lic.jpg" alt="linc로고"/></a></div>
        </div>
    </body>
</html>
