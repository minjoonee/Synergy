<?php
$upload_dir = "/var/www/html/board/files/";
$file_size = $_FILES['userfile']['size'];
$file_name = $_FILES['userfile']['name'];
$tmp_file = $_FILES['userfile']['tmp_name'];
$file_path = $upload_dir . basename($_FILES["userfile"]["name"]);
$image_url = $url['root'].'/board/files/' . $file_name;
echo "$upload_dir<br>";
echo "$file_path<br>";
  if(move_uploaded_file($tmp_file,$file_path)){
    echo "$file_name<br>";
    echo "$tmp_file<br>";
    echo "$image_url<br>";
    echo "$file_path<br>";
  }
  else{
    echo "failed<br>";
  }
 ?>


<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8">
<title>image_uploader.php</title> 
<script src="../../js/popup.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="../../css/popup.css" type="text/css"  charset="utf-8"/>
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
                
        execAttach(_mockdata);
        closeWindow();
                
    }
// ]]>
</script>
</head>
<body onload="initUploader();">

</body>
</html> 

