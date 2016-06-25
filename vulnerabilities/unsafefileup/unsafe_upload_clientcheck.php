<?php 
include_once 'inc/uploadfunction.php';
$html='';
if(isset($_POST['submit'])){
//     var_dump($_FILES);
    $save_path='uploads';//指定在当前目录建立一个目录
    $upload=upload_client('uploadfile',$save_path);//调用函数
    if($upload['return']){
        $html.="<p class='notice'>文件上传成功</p><p class='notice'>文件保存的路径为：{$upload['new_path']}</p>"; 
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
<script>
function checkFileExt(filename)
{
 var flag = false; //状态
 var arr = ["jpg","png","gif"];
 //取出上传文件的扩展名
 var index = filename.lastIndexOf(".");
 var ext = filename.substr(index+1);
 //比较
 for(var i=0;i<arr.length;i++)
 {
  if(ext == arr[i])
  {
   flag = true; //一旦找到合适的，立即退出循环
   break;
  }
 }
 //条件判断
 if(!flag)
 {
  alert("上传的文件不符合要求，请重新选择！");
  location.reload(true);
 }
}
</script>
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
    <p class="title">这里只允许上传图片o！</p>
    <form class="upload" method="post" enctype="multipart/form-data"  action="">
        <input class="uploadfile" type="file"  name="uploadfile" onchange="checkFileExt(this.value)"/><br />
        <input class="sub" type="submit" name="submit" value="开始上传" />
    </form>
    <?php 
    echo $html;//输出了路径，暴露了
    ?>
</div>

<div id="right_bar">
	<p class="tips">tips:<br />尝试一下，看看这里对图片类型的限制是怎么做的?<br />貌似是通过前端JS?..前端JS?</p>
</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>
</body>
</html>