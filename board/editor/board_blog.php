<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title>Daum 에디터</title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
<script type="text/javascript">
function saveContent() {
    if(jQuery("#title").val() == "") {
        alert("제목을 입력해 주세요.");
        jQuery("#title").focus();
        return;
    }

    Editor.save(); // 이 함수를 호출하여 글을 등록하면 된다.
}
</script>
</head>
<body>
<form name="tx_editor_form" id="tx_editor_form" action="view.php" method="post" enctype="multipart/form-data" accept-charset="utf-8">
&nbsp;<b>제목&nbsp;:</b>&nbsp;<input type="text" id="title" name="title" style="width:680px;"/>
<div style="height:10px;"></div>
<div style="width:750px;">
<?php
    include_once ("/var/www/html/board/editor/daumEditor/editor.html");      // 다음 에디터를 include 한다.
?>
<div align="right"><input type="button" value="등록" onClick="saveContent();"/></div>
</div>
</form>
</body>
</html>

