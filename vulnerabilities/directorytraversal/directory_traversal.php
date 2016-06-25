
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cross-Site Scripting</title>
<link rel="stylesheet" type="text/css" href="../../style/header.css"/>
<link rel="stylesheet" type="text/css" href="../../style/dirtra.css"/>
</head>

<body>
<div id="top">
    <h1 class="title">Ant Web Application System</h1>
    <a href="../../index.php">回到首页</a>
</div>
<div id="left_bar">
	<h2 class="left_title">Directory traversal</h2>
    <ul class="left_list">
    	<li><a href="directory_traversal.php">目录遍历漏洞概述</a></li>
        <li><a href="dt_list.php">../../etc/passwd</a></li>

    </ul>
</div>
<div id="vul_info">
	<dl>
    	<dt class="vul_title">目录遍历漏洞概述</dt>
        <dd class="vul_detail">
在web功能设计中,很多时候我们会要将需要访问的文件定义成变量，从而让前端的功能便的更加灵活。
当用户发起一个前端的请求时，便会将请求的这个文件的值(比如文件名称)传递到后台，后台再执行其对应的文件。
在这个过程中，如果后台没有对前端传进来的值进行严格的安全考虑，则攻击者可能会通过“../”这样的手段让后台打开或者执行一些其他的文件。
从而导致后台服务器上其他目录的文件结果被遍历出来，形成目录遍历漏洞。<br />
        <dd class="vul_detail">
看到这里,你可能会觉得目录遍历漏洞和不安全的文件下载，甚至文件包含漏洞有差不多的意思，是的，目录遍历漏洞形成的最主要的原因跟这两者一样，都是在功能设计中将要操作的文件使用变量的
方式传递给了后台，而又没有进行严格的安全考虑而造成的，只是出现的位置所展现的现象不一样，因此，这里还是单独拿出来定义一下。
       </dd>
        </dd>
        <dd class="vul_detail">
需要区分一下的是,如果你通过不带参数的url（比如：http://xxxx/doc）列出了doc文件夹里面所有的文件，这种情况，我们成为敏感信息泄露。
而并不归为目录遍历漏洞。（关于敏感信息泄露你你可以在"i can see you ABC"中了解更多）
        </dd>
        <dd class="vul_detail">
 你可以通过“Directory traversal”对应的测试栏目，来进一步的了解该漏洞。
    	</dd>
    </dl>
</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>


