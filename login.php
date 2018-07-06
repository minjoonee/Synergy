<!--login !-->
<!DOCTYPE html>

<html lang="ko" dir="ltr">

<head>

<meta charset="utf-8">

<title>login</title>

<!-- 파비콘 추가 herf부분을 바꾼다.-->

<link rel="shortcut icon" href="/img/pabi.ico">

<style type="text/css">

#body_all{

  font-size:24px;
  text-align:center;
  margin-top:5%;
  margin-bottom: 3%;
  margin-left: 30%;
  margin-right: 30%;
}
legend {
      font-size: 180%;
      border: solid;
}
/*색깔변경!*/
#id:valid {
border-color: forestgreen;
border-width:3px;
width:200px;
height:25px;
}

#id:invalid {

border-color: firebrick;
width:200px;
border-width:3px;
height:25px;
}

#pw:valid {

border-color: forestgreen;
width:200px;
border-width:3px;
height:25px;
}

#pw:invalid {

border-color: firebrick;
width:200px;
border-width:3px;
height:25px;
}

hr{

width:70%;

border-bottom-color:black;

border-width:3px;

}

fieldset{
border-color: black;
margin: 0 auto;
width:400px;
text-align:center;
border-width:3px;
margin-bottom: 40px;
}



.login_box input[type="text"],
.login_box input[type="password"]{
    padding-right: 30%;
    padding-top:2%;
    padding-bottom:2%;
    font-weight: bold;

}
.login_box input[type="text"]{
  margin-top:5%;
}

/*로그인,홈,회원가입 버튼 크기와 색깔*/
.login_box input[type="submit"],
.login_box input[type="button"]{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 50%;
    padding: 3%;
    background: #43D1AF;
    border-bottom: 2px solid #30C29E;
    border-top-style: none;
    border-right-style: none;
    border-left-style: none;
    color: #fff;
}

.su input[type="submit"],
.su input[type="button"]{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 432px;
    height:10%;
    background: #43D1AF;
    border-bottom: 2px solid #30C29E;
    border-top-style: none;
    border-right: solid 3px #fff;
    border-left: solid 3px #fff;
    color: #fff;

    margin:10 auto;

}
/*마우스올리면 색이 바뀜*/
.login_box input[type="submit"]:hover,
.login_box input[type="button"]:hover{
    background: #2EBC99;
}
.su input[type="submit"]:hover,
.su input[type="button"]:hover{
    background: #2EBC99;
}
input {
   border: solid;
   padding: 8px;
   line-height: 1.2em;
   margin-bottom: 1.4em;
   font-size: 1.2em;
 }

 /*메뉴*/

 #menu{
   margin-bottom:30px;
   width:100% ;
   height : 70px;
   background-color: rgb(255,243,167);
   position: fixed;
   top: 0px;
   z-index: 100;
   overflow: hidden;
 }
 #menuin{
   width : 80%;
   height :130%;
   background-color: #ffdc3c;
 }
 #menuul{
     padding: 0px;
     margin: 0px;
     list-style: none;
 }
 #menuli{
   float : right;
   color: rgb(85,85,68);
   font-family: 'Lora', serif;
   color: rgb(85,85,68);
   font-weight: bold;
   font-size: 150%;
   display: block;
   height: 57px;
   width: 200px;
   border-right: 5px solid rgb(255,243,167);
   padding-top: 23px;
   text-align: center;
 }
 #menuli>a{                                                /*전체 a테그*/
   text-decoration:none;
   color: rgb(85,85,68);
 }
 #menuli:hover{
   background-color: #ffc000;
   transition: 0.5s;
 }
/* 링크 아이콘*/
#link{
  width : 1300px;
  height: 200px;
  text-align : center;
	margin:0 auto;

}
#chon{
  width : 400px;
  height: 125px;
  float : left;

}
#it{
  width : 400px;
  height: 125px;

  display: inline-block;
}
#lic{
  width : 400px;
  height: 125px;
  float : right;
}
</style>
</head>
<body>
  <header>

    <div id="menu">
      <div id="menuin"><?php
        echo file_get_contents("menu.txt");
      ?>
      </div>
    </div>

  </header>
  <div id="body_all">
          <div id="logo">
            <a href="index.php"><img src="/img/SYlogo.jpg" alt="로고"/></a>
          </div>
</br>
  <div><img src="/img/write1.jpg" alt="로고"/></div>
  <div><img src="/img/write2.jpg" alt="로고"/></div>
  <hr/>
<br/>
<fieldset class="login_box">
  <legend>synergy login</legend>
<!--pattern부분을 수정해서 색깔 바뀌는 기준변경 -->
<form class="" action="login_check.php" method="post">
<input type="text" name="id" id="id" placeholder="아이디" pattern=".{5,15}" required>
<input type="password" name="pw" id="pw" placeholder="비밀번호" pattern=".{6,}" required>
<input type="submit" value="로그인">

</form>
</fieldset>
<div class="su">
<form action="signup.html" method="post">
<input type="submit" value="회원가입"></form>
</div>
</div>

<!--링크-->
       <div id="link">
         <div id="chon" ><a href="http://jbnu.ac.kr/kor/" target="_blank"><img src="/img/chon.jpg" alt="전북로고"/></a></div>
         <div id="it"><a href="https://it.jbnu.ac.kr/itjbnu/2016/inner.php?sMenu=main" target="_blank"><img src="/img/it.jpg" alt="it로고"/></a></div>
         <div id="lic"><a href="https://lincplus.jbnu.ac.kr/" target="_blank"><img src="/img/lic.jpg" alt="linc로고"/></a></div>
       </div>
</body>

</html>
