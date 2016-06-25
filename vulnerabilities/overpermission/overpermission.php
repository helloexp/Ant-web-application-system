
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cross-Site Scripting</title>
<link rel="stylesheet" type="text/css" href="../../style/header.css"/>
<link rel="stylesheet" type="text/css" href="../../style/op.css"/>
</head>

<body>
<div id="top">
    <h1 class="title">Ant Web Application System</h1>
    <a href="../../index.php">回到首页</a>
</div>
<div id="left_bar">
	<h2 class="left_title">Over permission</h2>
    <ul class="left_list">
    	<li><a href="overpermission.php">越权漏洞概述</a></li>
        <li><a href="op1/overadmin.php">Over permission</a></li>
         <li><a href="op2/overadmin.php">Over permission+</a></li>
    </ul>
</div>
<div id="vul_info">
        <dd class="vul_detail">
      如果使用A用户的权限去操作B用户的数据，A的权限小于B的权限，如果能够成功操作，则称之为越权操作。
       越权漏洞形成的原因是后台使用了 不合理的权限校验规则导致的。
        </dd>
        <dd class="vul_detail">
      一般越权漏洞容易出现在权限页面（需要登录的页面）增、删、改、查的的地方，当用户对权限页面内的信息进行这些操作时，后台需要对
      对当前用户的权限进行校验，看其是否具备操作的权限，从而给出响应，而如果校验的规则过于简单则容易出现越权漏洞。
        </dd>  
        <dd class="vul_detail_1">
       因此，在在权限管理中应该遵守：<br />
       1.使用最小权限原则对用户进行赋权;<br />
       2.使用合理（严格）的权限校验规则;<br />
        
        </dd>
        <dd class="vul_detail_1">
        你可以通过“Over permission”对应的测试栏目，来进一步的了解该漏洞。
    	</dd>
    </dl>
</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>


