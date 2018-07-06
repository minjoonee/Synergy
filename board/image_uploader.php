<?php
$upload_dir = "/var/www/html/board/files/";
$file_size = $_FILES['userfile']['size'];
$file_name = $_FILES['userfile']['name'];
$tmp_file = $_FILES['userfile']['tmp_name'];
$image_url = $url['root'].'files/' . $upload_filename;
$file_path = $upload_dir . basename($_FILES["userfile"]["name"]);
  move_uploaded_file($tmp_file,$file_path);
 ?>


<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8">
<title>image_uploader.php</title> 
<script src="./js/popup.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="./css/popup.css" type="text/css"  charset="utf-8"/>
<script type="text/javascript">
// <![CDATA[
    
    function initUploader(){
            
        var _opener = PopupUtil.getOpener();
        if (!_opener) {
            alert('잘못된 경로로 접근하셨습니다.');
            return;
        }
        
        var _attacher = getAttacher('image', _opener);
        registerAction(_attacher);
            
            if (typeof(execAttach) == 'undefined') { //Virtual Function
            return;
        }
        
        var _mockdata = {
            'imageurl': '<?php echo $image_url; ?>',
            'filename': '<?php echo $file_name; ?>',
            'filesize': <?php echo $file_size; ?>,
            'imagealign': 'C',
            'originalurl': '<?php echo $image_url; ?>',
            'thumburl': '<?php echo $image_url; ?>'
        };
                
    }
// ]]>
</script>
</head>
<body>
<script>
        initUploader();
        execAttach(_mockdata);
        window.close();
</script>
</body>
</html> 

