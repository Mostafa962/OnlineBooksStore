<html>
<head>
<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=?id=<?=$_GET['id']?>'>
</head>
<body>
Upload progress:<br />
<?php
    if(!$_GET['id']) die;
    $info = uploadprogress_get_info($_GET['id']);
    $kbytes_total = round($info['bytes_total'] / 1024);
    $kbytes_uploaded = round($info['bytes_uploaded'] / 1024);
    echo $kbytes_uploaded.'/'.$kbytes_total.' KB';
?>
</body>
</html>
