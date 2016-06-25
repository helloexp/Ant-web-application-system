
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cross-Site Scripting</title>
<link rel="stylesheet" type="text/css" href="../../style/header.css"/>
<link rel="stylesheet" type="text/css" href="../../style/usd.css"/>
</head>

<body>
<div id="top">
    <h1 class="title">Ant Web Application System</h1>
    <a href="../../index.php">回到首页</a>
</div>
<div id="left_bar">
	<h2 class="left_title">Unsafe file download</h2>
    <ul class="left_list">
    	<li><a href="download.php">不安全的文件下载漏洞概述</a></li>
        <li><a href="unsafe_down.php">Unsafe download</a></li>

    </ul>
</div>
<div id="vul_info">
	<dl>
    	<dt class="vul_title">不安全的文件下载概述</dt>
        <dd class="vul_detail">
    文件下载功能在很多web系统上都会出现，一般我们当点击下载链接，便会向后台发送一个下载请求，一般这个请求会包含一个需要下载的文件名称，后台在收到请求后
    会开始执行下载代码，将该文件名对应的文件response给浏览器，从而完成下载。
    如果后台在收到请求的文件名后,将其直接拼进下载文件的路径中而不对其进行安全判断的话，则可能会引发不安全的文件下载漏洞。<br />
     
   此时如果 攻击者提交的不是一个程序预期的的文件名，而是一个精心构造的路径(比如../../../etc/passwd),则很有可能会直接将该指定的文件下载下来。
   从而导致后台敏感信息(密码文件、源代码等)被下载。
       
        </dd>
        <dd class="vul_detail">
   所以，在设计文件下载功能时，如果下载的目标文件是由前端传进来的，则一定要对传进来的文件进行安全考虑。
   切记：所有与前端交互的数据都是不安全的，不能掉以轻心！
        </dd>
        <dd class="vul_detail">
    你可以通过“Unsafe file download”对应的测试栏目，来进一步的了解该漏洞。
    	</dd>
    </dl>
</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>


