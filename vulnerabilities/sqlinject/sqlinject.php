<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sql Inject</title>
<link rel="stylesheet" type="text/css" href="../../style/header.css"/>
<link rel="stylesheet" type="text/css" href="../../style/sqli.css"/>
</head>
<body>
<div id="top">
    <h1 class="title">Ant Web Application System</h1>
    <a href="../../index.php">回到首页</a>
</div>
<div id="left_bar">
	<h2 class="left_title">Sql Inject</h2>
    <ul class="left_list">
  		<li><a href="sqlinject.php">Sql Inject（SQL注入）概述</a></li>
        <li><a href="sqlinject_id.php">数字型注入(post)</a></li>
        <li><a href="sqlinject_str.php">字符型注入(get)</a></li>
        <li><a href="sqlinject_search.php">搜索型注入</a></li>
        <li><a href="sqlinject_xxx.php">xxx型注入</a></li>
        <li><a href="sqlinjectiu/iu_login.php">“insert/update”注入</a></li>
        <li><a href="sqlinjectdel/sqli_del.php">“delete”注入</a></li>
        <li><a href="sqlinjecthttp/http_header.php">http头注入</a></li>
        <li><a href="sqlinject_blind_b.php">盲注（base on boolian）</a></li>
        <li><a href="sqlinject_blind_t.php">盲注（base on time）</a></li>
    </ul>
</div>

<div id="vul_info">
	<dl>
    	<dt class="vul_title">Sql Inject(SQL注入)概述</dt>
    	<dd class="vul_detail">
    	SQL注入漏洞，可怕的漏洞。<br />
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;在owasp发布的top10排行榜里，注入漏洞一直是危害排名第一的漏洞，其中主要指数据库注入漏洞。<br />
    	<b>一个严重的SQL注入漏洞，可能会直接导致一家公司破产！</b><br />
    	SQL注入漏洞主要形成的原因是在数据交互中，前端的数据传入到后台处理时，没有做严格的判断，导致其传入的“数据”拼接到SQL语句中后，被当作SQL语句的一部分执行。
    	从而导致数据库受损（被脱裤、被删除、甚至整个服务器权限沦陷）。<br />
    	</dd>
    	
    	<dd class="vul_detail">
    	在构建代码时，一般会从如下三个方面的策略来防止SQL注入漏洞：<br />
    	1.对传进SQL语句里面的变量进行过滤，不允许危险字符传入；<br />
    	2.对传进SQL语句里面的变量进行转义，让其变成实体而不被解析；<br />
    	3.使用参数化（Parameterized Query 或 Parameterized Statement）；<br />
    	</dd>
    	
    	<dd class="vul_detail">
        SQL注入在网络上非常热门，也有很多技术专家写过非常详细的关于SQL注入漏洞的文章，这里就不在多费手指了。
                        你可以通过“Sql Inject”对应的测试栏目，来进一步的了解该漏洞。
    	</dd>
    	
    </dl>

</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>
