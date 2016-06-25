<?php 
include_once 'inc/uploadfunction.php';
$html='';
if(isset($_POST['submit'])){
    $type=array('jpg','jpeg','png');//指定类型
    $mime=array('image/jpg','image/jpeg','image/png');
    $save_path='uploads'.date('/Y/m/d/');//根据当天日期生成一个文件夹
    $upload=upload('uploadfile','512000',$type,$mime,$save_path);//调用函数
    if($upload['return']){
        $html.="<p class='notice'>文件上传成功</p><p class='notice'>文件保存的路径为：{$upload['save_path']}</p>"; 
    }else{
        $html.="<p class=notice>{$upload['error']}</p>";
        
    }
}
   
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cross-Site Scripting</title>
<link rel="stylesheet" type="text/css" href="../../style/header.css"/>
<link rel="stylesheet" type="text/css" href="../../style/usu.css"/>
</head>

<body>
<div id="top">
    <h1 class="title">Ant Web Application System</h1>
    <a href="../../index.php">回到首页</a>
</div>

<div id="left_bar">
	<h2 class="left_title">Unsafe file upload</h2>
    <ul class="left_list">
    	<li><a href="upload.php">不安全的文件上传漏洞概述</a></li>
    	<li><a href="unsafe_upload_clientcheck.php">客户端验证上传</a></li>
        <li><a href="unsafe_upload.php">服务端验证上传(MIME)</a></li>
        <li><a href="unsafe_upload_check.php">服务端验证上传(getimagesize)</a></li>
    </ul>
</div>

<div id="usu_main">
    <p class="title">这里只允许上传图片，不要乱搞！</p>
    <form class="upload" method="post" enctype="multipart/form-data"  action="">
        <input class="uploadfile" type="file"  name="uploadfile" /><br />
        <input class="sub" type="submit" name="submit" value="开始上传" />
    </form>
    <?php 
    echo $html;//输出了路径，暴露了
    ?>
</div>

<div id="right_bar">
	<p class="tips">tips:<br />这下验证严格多了?<br />是否使用了get_image_size()?</p>
</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>
</body>
</html>