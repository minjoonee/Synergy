<!--
게시글 작성
1.소은지 -20180604
-->
<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="http://210.117.181.75/Board_ex2/style.css">
</head>
<body id="target">
  <div id="control">
    <a href="http://210.117.181.75/Board_ex2/write.php">쓰기</a>
  </div>
  <article>
    <!-- post 형식으로 process.php에게 값 전달 -->
    <form action="process.php" method="post">
      <!--p 태그는 단락 나눠줌 / input text 형식으로 title이라는 이름을 갖는 입력 상자 만들어줌  -->
      <p>
        제목 : <input type="text" name="title">
      </p>
      <p>
        작성자 : <input type="text" name="author">
      </p>
      <p>
        비밀번호 : <input type="password" name="pass" size=4 maxlength=4> (4자리 숫자를 입력하세요.)
      </p>
      <p>
        본문 : <textarea name="description"></textarea>
      </p>
      <input type="submit" name="name">
      &nbsp; &nbsp;
      <input type="button" value="취소" onclick ="history.back(-1)">
    </form>
  </article>
</body>
</html>
