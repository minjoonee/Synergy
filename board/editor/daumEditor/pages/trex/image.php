<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form enctype="multipart/form-data" action="/board/editor/daumEditor/pages/trex/upload_image.php" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="16000000">
    <input type="file" name="userfile" >
	<br>File size limit is 16MB
    <br><br>
    <input type="submit" value="Submit">
    </form>
  </body>
</html>
