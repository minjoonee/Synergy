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
        <title>Synergy 자유게시판</title>
    <link rel="shortcut icon" href="/img/pabi.ico">
    <link rel="stylesheet" type="text/css" href="/style3.css">
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
width: 99%;
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


        <!-- ****게시판 나타나는 부분 **** -->
        <div>
        <?php
            $tablename = "freeboard_tb";
            $data = mysqli_query($conn, "SELECT *FROM $tablename order by num DESC");
            $num = mysqli_num_rows($data);
            $list = 10; // 목록 개수
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
         <table width="600"  cellpadding="5" cellspacing="2" align="center" style="table-layout:fixed; word-break:break-all;">

         <tr>
             <th width=30>
                 <p align=center>번호</p>
             </th>
             <th width=600>
                 <p align=center>제목</p>
             </th>
             <th width=100>
                 <p align=center>아이디</p>
             </th>
             <th width=auto>
                 <p align=center>날짜</p>
             </th>

             <th width=30>
                 <p align=center>조회수</p>
             </th>
         </tr>
         <?php // 디비에 있는 자료 목록
         while ($array = mysqli_fetch_array($result)) {
             // code...
               echo "
                 <tr>
                    <td width=50>
                        <p align=center>$array[num]</p>
                    </td>
                    <td width=300>
                        <p align=center><a href='/board/freeboard_view.php?num=$array[num]&page=$page'>$array[title]</a></p>
                    </td>
                    <td width=100>
                        <p align=center>$array[id]</p>
                    </td>
                    <td width=60>
                        <p align=center>$array[date]</p>
                    </td>
                    <td width=50>
                        <p align=center>$array[view]</p>
                    </td>
                </tr>";
           }
            ?>
      </table>
    </div>
            <div id= "listnum" style="width= 800px; margin-left: 400px;">
             <?php
                if($num!=0&&$page>$max_block && $pageNum<=$count*$max_block){
                    if($Ncount==1){
                        $next = $page-1;
                        echo"<a href='/board/freeboard.php?page=$next'>[이전]</a>";
                    }
                    for($next=(($count-1)*$max_block)+1; $next<=$pageNum; $next++){
                        if($page==$next){
                            echo"[$page]";
                        }
                        else{
                            $go_page = $next;
                            echo"<a href='/board/freeboard.php?page=$go_page'>[$go_page]</a>";
                        }
                    }
                }
                else if($num!=0&&$page>$max_block){
                    if($Ncount==1){
                        $next = $page-1;
                        echo"<a href='/board/freeboard.php?page=$next'>[이전]</a>";
                    }
                    for($next=1; $next<=$max_block; $next++){
                        if($page%$max_block==$next){
                            echo"[$page]";
                        }
                        else{
                            if($page<=$pageNum){
                                $go_page = $next+$max_block;
                                echo"<a href='/board/freeboard.php?page=$go_page'>[$go_page]</a>";
                            }
                        }
                    }
                    if($Ncount==0){
                        $go_page = $page+1;
                        echo "<a href='/board/freeboard.php?page=$go_page'>[다음]</a>";
                    }
                }

                else if($num!=0&&$page<=$max_block){
                    for($next=1; $next<=$max_block; $next++){
                        if($next==$page){
                            echo"[$next]";
                        }
                        else{
                            echo "<a href='/board/freeboard.php?page=$next'>[$next]</a>";
                        }
                    }
                    if($Ncount==0&& $page+1<=$pageNum){
                        $go_page=$page+1;
                        echo "<a href='/board/freeboard.php?page=$go_page'>[다음]</a>";
                    }
                }
            ?>
            </div>
            <form class="" action="/board/freeboard_add.php?page=<?php echo"$page";?>"  autocomplete="off"  method="post" style="width: 765px;">
                <input type="submit" value="작성" style="float: right; margin-top:20px; margin-left:-20px;">
                </form>


          </div>
        </div>
      </div>
    </body>
</html>

