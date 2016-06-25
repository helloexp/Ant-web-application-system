
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cross-Site Scripting</title>
<link rel="stylesheet" type="text/css" href="../../style/header.css"/>
<link rel="stylesheet" type="text/css" href="../../style/comminject.css"/>
</head>

<body>
<div id="top">
    <h1 class="title">Ant Web Application System</h1>
    <a href="../../index.php">回到首页</a>
</div>
<div id="left_bar">
	<h2 class="left_title">Sys-Command Inject</h2>
    <ul class="left_list">
    	<li><a href="comm_inject.php">系统命令注入漏洞概述</a></li>
        <li><a href="exec_ping.php">exec “ping”</a></li>

    </ul>
</div>
<div id="vul_info">
	<dl>
    	<dt class="vul_title">Sys-Command Inject（系统命令注入）概述</dt>
        <dd class="vul_detail">
        Sys-Command Inject（命令注入）漏洞，可以让攻击者直接向后台服务器注入操作系统命令，从而控制后台系统。
        </dd>
        <dd class="vul_detail">
        一般出现这种漏洞，是因为应用系统从设计上需要给用户提供指定的远程命令操作的功能，比如我们常见的路由器、防火墙、入侵检测等设备的web管理界面上
        一般会给用户提供一个ping操作的web界面，用户从web界面输入目标IP，提交后，后台会对该IP地址进行一次ping测试，并返回测试结果。
        而，如果，设计者在完成该功能时，没有做严格的安全控制，则可能会导致攻击者通过该接口提交“意想不到”的命令，从而让后台进行执行，从而控制整个后台服务器。
        </dd>
        <dd class="vul_detail">
        因此，如果需要给前端用户提供安全的系统命令操作接口，我们需要对接口输入的内容进行严格的判断，比如实施严格的白名单策略会是一个比较好的方法。
        </dd>
        <dd class="vul_detail_1">
        你可以通过“Sys-Command Inject”对应的测试栏目，来进一步的了解该漏洞。
    	</dd>
    </dl>
</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>


