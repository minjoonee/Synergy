<!DOCTYPE html>
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

<html lang="ko">
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
	margin:5px;
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

</style>
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
              <div id="lo1"><a href="Home.php"><img src="/img/SYlogo.jpg" alt="로고"/></a></div>
              <div id="lo2"><a href="Home.php"><img src="/img/SYlogo2.jpg" alt="로고"/></a></div>
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
          <div id="art">
          <div id="infor">
          <table style ="width:650px;">
            <thead>
                <tr>
                    <th> IT정보공학과 공지사항 </th>
                </tr>
            </thead>
            <tbody>
            <?php
            $tablename = "notice_tb";
            $query = "select *from $tablename";
            $result = mysqli_query($conn, $query);
            while ($array = mysqli_fetch_array($result)) {
                echo"<tr><td><a href='https://it.jbnu.ac.kr/itjbnu/2016/$array[href]' target='_blank'>$array[notice]</a></td></tr>";
            }
            ?>
            </tbody>
          </table>
        </div>

        <!-- ----------------- 방명록 ------------------>
        <!-- **** 방명록 나타나는 부분 **** -->
        <div id="visit">
        <?php
            $tablename = "welcome_tb";
            $data = mysqli_query($conn, "SELECT *FROM $tablename order by num DESC");
            $num = mysqli_num_rows($data);
            $list = 8; // 목록 개수
            $max_block = 5; // 표시되는 block 수
            $pageNum = ceil($num/$list); // 총 페이지
            $page = ($_GET['page']) ? $_GET['page'] : 1; // 최초 페이지에서는 1값
            $start = ($page-1)*$list; // 시작 넘버
            $count = ceil($page/$max_block);
            $Ncount = $page%$max_block;
            $next;
            $go_page;
            $query = "select * from $tablename order by num DESC limit $start, $list";
            $result = mysqli_query($conn, $query);
         ?>
         <table cellpadding="5" cellspacing="2" align="center" style="table-layout:fixed; word-break:break-all; float: left;">
           <tr>
               <th width=50>
                   <p align=center>아이디</p>
               </th>
               <th width=300>
                   <p align=center>게시판 내용</p>
               </th>
               <th width=170>
                   <p align=center>날짜</p>
               </th>
               <th width=70>
                   <p align=center>수정</p>
               </th>

           </tr>
           <?php // 디비에 있는 자료 목록
           // 삭제기능도 추가, 수정은 아직...

           while ($array = mysqli_fetch_array($result)) {
               // code...
                 echo "
                   <tr>
                      <td width=100>
                          <p align=center><a href='user_info.php?id=$array[id]'>$array[id]</a></p>
                      </td>
                      <td width=300>
                          <p align=center>$array[content]</p>
                      </td>
                      <td width=70>
                          <p align=center>$array[date]</p>
                      </td>
                      <td width=50>
                        <a href='welcome_edit.php?page=$page&num=$array[num]'>수정</a>";
                 echo" / ";
                 echo "
                        <a href='welcome_delete.php?page=$page&num=$array[num]'>삭제</a>
                        </td>
                  </tr>";
             }
              ?>
        </table>
    </div>
            <div id= "listnum" style="width:150px; margin-top:-30px; margin-bottom:7px; margin-right:230px; float:right;">
             <?php
                if($page>$max_block && $pageNum<=$count*$max_block){
                    if($Ncount==1){
                        $next = $page-1;
                        echo"<a href='Home.php?page=$next'>[이전]</a>";
                    }
                    for($next=(($count-1)*$max_block)+1; $next<=$pageNum; $next++){
                        if($page==$next){
                            echo"[$page]";
                        }
                        else{
                            $go_page = $next;
                            echo"<a href='Home.php?page=$go_page'>[$go_page]</a>";
                        }
                    }
                }
                else if($page>$max_block){
                    if($Ncount==1){
                        $next = $page-1;
                        echo"<a href='Home.php?page=$next'>[이전]</a>";
                    }
                    for($next=1; $next<=$max_block; $next++){
                        if($page%$max_block==$next){
                            echo"[$page]";
                        }
                        else{
                            if($page<=$pageNum){
                                $go_page = $next+$max_block;
                                echo"<a href='Home.php?page=$go_page'>[$go_page]</a>";
                            }
                        }
                    }
                    if($Ncount==0){
                        $go_page = $page+1;
                        echo "<a href='Home.php?page=$go_page'>[다음]</a>";
                    }
                }

                else if($page<=$max_block){
                    for($next=1; $next<=$max_block; $next++){
                        if($next==$page){
                            echo"[$next]";
                        }
                        else{
                            echo "<a href='Home.php?page=$next'>[$next]</a>";
                        }
                    }
                    if($Ncount==0&& $page+1<=$pageNum){
                        $go_page=$page+1;
                        echo "<a href='Home.php?page=$go_page'>[다음]</a>";
                    }
                }
            ?>
            </div>

            <!-- ***** 방명록 쓰는 부분 ***** -->
             <div style="margin-left: 600px;">

                <form class="" action="welcome_write.php"  autocomplete="off"  method="post" style="width: 765px;">
                <textarea name="content" maxlength=19 style="width: 550px; height: 38px;"></textarea>
                <input type="submit" placeholder="내용" value="글쓰기" style="float: right; margin-top:20px; margin-right:80px;">
                </form>
            </div>
        </div>



<div id="photoback">
        <div id = "photo">
          <img class = "slides" src = "img/1.jpg">
          <img class = "slides" src = "img/2.jpg">
          <img class = "slides" src = "img/4.jpg">
          <img class = "slides" src = "img/5.jpg">
          <img class = "slides" src = "img/6.jpg">
          <button class = "btn" onclick="plusIndex(-1)" id = "btn1">&#10094;</button>
          <button class = "btn" onclick="plusIndex(1)" id = "btn2">&#10095;</button>
        </div>
</div>
    </div>

        <!--링크-->
        <div id="link">
          <div id="chon" ><a href="http://jbnu.ac.kr/kor/" target="_blank"><img src="/img/chon.jpg" alt="전북로고"/></a></div>
          <div id="it"><a href="https://it.jbnu.ac.kr/itjbnu/2016/inner.php?sMenu=main" target="_blank"><img src="/img/it.jpg" alt="it로고"/></a></div>
          <div id="lic"><a href="https://lincplus.jbnu.ac.kr/" target="_blank"><img src="/img/lic.jpg" alt="linc로고"/></a></div>
        </div>
        <div id="member">

        </div>
    </body>
    <script>
      var index = 1;

      function plusIndex(n){
        index = index + 1;
        showImage(index);
      }

      showImage(1);

      function showImage(n){
        var i;
        var x = document.getElementsByClassName("slides");
        if(n > x.length){index = 1};
        if(n < 1){index = x.length};
        for(i=0;i<x.length; i++)
        {
          x[i].style.display = "none";
        }
        x[index-1].style.display = "block";
      }

      autoSlide();

      function autoSlide(){
        var i;
        var x = document.getElementsByClassName("slides");
        for(i=0;i<x.length; i++)
        {
          x[i].style.display = "none";
        }
        if(index > x.length) { index = 1 }

        x[index-1].style.display = "block";
        index++;

        setTimeout(autoSlide, 3000);
      }
    </script>
</html>
