<?php $timestamp = time(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Daum에디터 - 이미지 첨부</title> 
<link rel="stylesheet" href="http://210.117.181.75/board/editor/daumEditor/css/popup.css" type="text/css" charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="http://210.117.181.75/board/editor/daumEditor/css/uploadify.css">
<style type="text/css">
body {
    font:13px Arial, Helvetica, Sans-serif;
}
#queue {
    border:1px solid #E5E5E5;
    overflow:auto;
    margin-bottom:10px;
    padding:0 3px 3px;
    float:left;
    width:370px;
    height:490px;
}
#uploadButton {
    float:left;
    margin-left:10px;
}
</style>
<script src="http://210.117.181.75/board/editor/daumEditor/js/popup.js" type="text/javascript" charset="utf-8"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
<script src="http://210.117.181.75/board/editor/daumEditor/js/jquery.uploadify.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function done() {
        if(typeof(execAttach) == "undefined") {
            return;
        }



        // 업로드한 파일의 수만큼 게시판에 나타내기 위해 each 문을 통해 반복시킨다.
        jQuery(".fileInfo").each(function(idx) {
            var fileName = jQuery("input[name='fileName']").eq(idx).val();
            var fileUpName = jQuery("input[name='fileUpName']").eq(idx).val();
            var fileSize = jQuery("input[name='fileSize']").eq(idx).val();
            var fileUrl = "http://210.117.181.75/board/files/" + fileUpName;

            alert(idx + "\n/\n" + fileName + "\n/\n" + fileUpName + "\n/\n" + fileSize + "\n/\n" + fileUrl);

            var _mockdata = {
                  "imageurl" : fileUrl
                , "filename" : fileName
                , "filesize" : fileSize
                , "imagealign": "C"
                , "originalurl" : fileUrl
                , "thumburl" : fileUrl
            };



            execAttach(_mockdata);
        });

        closeWindow();
    }

    function initUploader() {

        var _opener = PopupUtil.getOpener();

        if(!_opener) {
            alert("잘못된 경로로 접근하셨습니다.");
            return;
        }

        var _attacher = getAttacher("image", _opener);
        registerAction(_attacher);
    }
</script>
</head>
<body onload="initUploader();">
<div class="wrapper">
    <div class="header">
        <h1>사진 첨부</h1>
    </div>    
    <div class="body">
        <dl class="alert">
            <dt>사진 첨부 확인</dt>
            <div style="height:10px;"></div>
            <div>
                <div id="queue" style="float:left;"></div>
                <div id="uploadButton">

                    <!-- 업로드할 파일을 선택하는 '파일 선택' 버튼 -->

                    <input id="file_upload" name="file_upload" type="file" multiple="true">



                    <!-- 선택한 파일을 실제 uploads 폴더에 위치시키는 버튼 -->

                    <a style="position:relative;top:8px;" href="javascript:;" onClick="jQuery('#file_upload').uploadify('upload')">Upload Files</a>
                </div>
            </div>
        </dl>
    </div>
    <div class="footer" style="width:100%;position:absolute;right:0px;bottom:0px;">
        <p><a href="javascript:;" onClick="closeWindow();" title="닫기" class="close">닫기</a></p>
        <ul>
            <li class="submit"><a href="javascript:;" onClick="done();" class="btnlink">등록</a></li>
            <li class="cancel"><a href="javascript:;" onClick="closeWindow();" title="취소" class="btnlink">취소</a></li>
        </ul>
    </div>
</div>
<div id="hiddenFile"></div>
</body>
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery("#file_upload").uploadify({
          auto : false                                 // 파일 선택 후 여부 자동 업로드 (기본값 : true)
        , removeCompleted : false               // 파일 업로드 성공 후 업로드 창의 자동 삭제 여부 (기본값 : true)
        , formData : {                                // formData 설정으로 사용자가 직접 업로드할 파일의 데이터를 지정할 수있다.
              timestamp : "<?= $timestamp; ?>"
            , token : "<?= md5('unique_salt'.$timestamp); ?>"
            , nation : "kr"
        }
        , queueID : "queue"                                                       // 파일 업로드 상황을 나타내는 창의 위치를 강제적으로 지정한다.
        , swf : "http://210.117.181.75/board/editor/module/uploadify.swf"            // 파일 업로드 이벤트에 사용될 플래쉬 파일
        , uploader : "http://210.117.181.75/editor/module/uploadify.php"    // 파일 업로드를 수행할 php 파일
        , onUploadComplete : function(file, data) {                         // 파일 하나의 업로드 작업이 완료 후 실행되는 트리거
            alert(data);
            var fileData = "<div class='fileInfo'>"
                            + "<input type='hidden' name='fileName' value='" + file.name + "'/>"
                            + "<input type='hidden' name='fileUpName' value='<?= $timestamp; ?>_" + file.name + "'/>"
                            + "<input type='hidden' name='fileSize' value='" + file.size +"'/>"
                            + "</div>";
            jQuery("#hiddenFile").append(fileData);
        }
    });
});
</script>
</html>



