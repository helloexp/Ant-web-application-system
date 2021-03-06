
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
<div id="vul_info">
	<dl>
    	<dt class="vul_title">不安全的文件上传漏洞概述</dt>
        <dd class="vul_detail">
文件上传功能在web应用系统很常见，比如很多网站注册的时候需要上传头像、上传附件等等。当用户点击上传按钮后，后台会对上传的文件进行判断
比如是否是指定的类型、后缀名、大小等等，然后将其按照设计的格式进行重命名后存储在指定的目录。
如果说后台对上传的文件没有进行任何的安全判断或者判断条件不够严谨，则攻击着可能会上传一些恶意的文件，比如一句话木马，从而导致后台服务器被webshell。
        </dd>
        <dd class="vul_detail">
所以，在设计文件上传功能时，一定要对传进来的文件进行严格的安全考虑。比如：<br />
--验证文件类型、后缀名、大小;<br />
--验证文件的上传方式;<br />
--对文件进行一定复杂的重命名;<br />
--不要暴露文件上传后的路径;<br />
--等等...<br />
        </dd>
        
        <dd class="vul_detail">
    你可以通过“Unsafe file upload”对应的测试栏目，来进一步的了解该漏洞。
    	</dd>
    </dl>
</div>



<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>
</body>
</html>