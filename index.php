<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTP-8">
<meta name="viewport" content="width=1100">
        <title>시너지</title>
    	<link rel="shortcut icon" href="/img/pabi.ico">
        <style>
            *{margin : 0 auto}
            body {
                background: radial-gradient(white 70%,rgb(255,243,167));
            }
            #ttt{
                width: 100%;
                height: 30px;
                margin-top: 200px;
            }
            #top{
                width: 50%;
                height: 30px;
                background-color: rgb(255,243,167);
                animation: home;
	  animation-iteration-count : infinite;
                animation-duration: 10s;
                float : left;
            }
             #bottom{
                width: 50%;
                height: 30px;
                background-color: #ffdc3c;
                animation: home;
	  animation-iteration-count : infinite;
                animation-duration: 10s;
                float : right;

            }
             #bbb{
                width: 100%;
                height: 30px;
                 margin-top: 40px;
            }
            #top2{
                width: 50%;
                height: 30px;
                background-color: rgb(255,243,167);
                animation: home;
	  animation-iteration-count : infinite;
                animation-duration: 10s;
                float : left;
            }
             #bottom2{
                width: 50%;
                height: 30px;
                background-color: #ffdc3c;
                animation: home;
	  animation-iteration-count : infinite;
                animation-duration: 10s;
                float : right;
            }

            #mid{
                height: 368px;
                width: 400px;
            }
            #ex{
                color: white;
                width : 300px;
                height: 30px;
                background-color: #6c6c6c;
                animation: ex1;
                animation-duration: 1s;
                text-align: center;
            }
            @keyframes ex1{
                0%{height: 0px}
                100%{height : 30px;}
            }
            @keyframes home{
               0%{width: 20%}
                25%{width : 50%}
                50%{width: 40%}
                75%{width : 50%}
                100%{width: 20%}           
	 }
        </style>

    </head>

    <body>
        <div id="ttt">
        <div id="top"></div>
        <div id="bottom"></div>
        </div>

      <div id = "mid">
          <a href="http://210.117.181.75/Home.php"><img src="/img/indexLogo.jpg"></a>
            <div id="ex">Welcome Synergy</div>
        </div>

        <div id="bbb">
        <div id="top2"></div>
        <div id="bottom2"></div>
        </div>
    </body>
</html>
