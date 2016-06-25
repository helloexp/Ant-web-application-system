
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cross-Site Scripting</title>
<link rel="stylesheet" type="text/css" href="../../style/header.css"/>
<link rel="stylesheet" type="text/css" href="../../style/xss.css"/>
</head>

<body>
<div id="top">
    <h1 class="title">Ant Web Application System</h1>
    <a href="../../index.php">回到首页</a>
</div>
<div id="left_bar">
	<h2 class="left_title">Cross-Site Scripting</h2>
    <ul class="left_list">
    	<li><a href="xss.php">xss（跨站脚本）概述</a></li>
        <li><a href="xss_reflected_get.php">反射型XSS(get)</a></li>
        <li><a href="xsspost/post_login.php">反射型XSS(post)</a></li>
        <li><a href="xss_stored.php">存储型XSS</a></li>
        <li><a href="xss_dom.php">DOM型XSS</a></li>
        <li><a href="xssblind/xss_blind.php">XSS盲打</a></li>
        <li><a href="xss_challenge.php">xss+</a></li>
        <li><a href="xss_htmlspecialchars.php">xss++</a></li>
    </ul>
</div>
<div id="vul_info">
	<dl>
    	<dt class="vul_title">XSS（跨站脚本）概述</dt>
        <dd class="vul_detail">
        Cross-Site Scripting 简称为“CSS”，为避免与前端叠成样式表CSS冲突，故又称XSS。一般XSS可以分为如下几种类型：<br />
        &nbsp;&nbsp;&nbsp;&nbsp;1.反射性XSS;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;2.存储型XSS;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;3.DOM型XSS;<br />
        </dd>
        <dd class="vul_detail">
        XSS漏洞一直被评估为web漏洞中危害较大的漏洞，在OWASP TOP10的排名中一直属于前三的江湖地位。
        XSS是一种发生在Web前端的漏洞，所以其危害的对象也是前端用户。形成XSS漏洞的主要原因是程序对输入和输出的校验不够严格，导致“精心构造”的字符输出在前端时被浏览器当作有效代码解析执行从而产生危害。因此在XSS漏洞的防范上，一般会采用“过滤”和“转义”
        两种策略：<br />
        &nbsp;&nbsp;&nbsp;&nbsp;过滤：对输入进行过滤，不允许可能导致XSS攻击的字符输入;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;转义：对输入和输出进行实体字符的转义;<br />
        </dd>
        <dd class="vul_detail_1">
        你可以通过“Cross-Site Scripting”对应的测试栏目，来进一步的了解该漏洞。
    	</dd>
    </dl>
</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>


