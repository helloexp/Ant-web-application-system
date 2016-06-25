
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cross-Site Scripting</title>
<link rel="stylesheet" type="text/css" href="../../style/header.css"/>
<link rel="stylesheet" type="text/css" href="../../style/infoleak.css"/>
</head>

<body>
<div id="top">
    <h1 class="title">Ant Web Application System</h1>
    <a href="../../index.php">回到首页</a>
</div>
<div id="left_bar">
	<h2 class="left_title">i can see your ABC</h2>
    <ul class="left_list">
    	<li><a href="infoleak.php">敏感信息泄露概述</a></li>
        <li><a href="findabc.php">找找看</a></li>

    </ul>
</div>
<div id="vul_info">
	<dl>
    	<dt class="vul_title">敏感信息泄露概述</dt>
        <dd class="vul_detail">
由于后台人员的疏忽或者不当的设计，导致不应该被前端用户看到的数据被轻易的访问到。
比如：<br />
---通过访问url下的目录，可以直接列出目录下的文件列表;<br />
---输入错误的url参数后报错信息里面包含操作系统、中间件、开发语言的版本或其他信息;<br />
---前端的源码（html,css,js）里面包含了敏感信息，比如后台登录地址、内网接口信息、甚至账号密码等;<br />


        </dd>
        <dd class="vul_detail">
 类似以上这些情况，我们成为敏感信息泄露。敏感信息泄露虽然一直被评为危害比较低的漏洞，但这些敏感信息往往给攻击着实施进一步的攻击提供很大的帮助,甚至“离谱”的敏感信息泄露也会直接造成严重的损失。
因此,在web应用的开发上，除了要进行安全的代码编写，也需要注意对敏感信息的合理处理。

        </dd>
        <dd class="vul_detail_1">
        你可以通过“i can see your abc”对应的测试栏目，来进一步的了解该漏洞。
    	</dd>
    </dl>
</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>


