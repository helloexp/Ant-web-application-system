<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Burt Force</title>
<link rel="stylesheet" type="text/css" href="../../style/header.css" />
<link rel="stylesheet" type="text/css" href="../../style/bf.css" />
</head>

<body>
<div id="top">
    <h1 class="title">Ant Web Application System</h1>
    <a href="../../index.php">回到首页</a>
</div>
<div id="left_bar">
	<h2 class="left_title">Burp Force</h2>
    <ul class="left_list">
    	<li><a href="burtforce.php">Burp Force（暴力破解）概述</a></li>
        <li><a href="bf_form.php">基于表单的暴力破解</a></li>
        <li><a href="bf_vcode_1.php">验证码绕过(on server)</a></li>
        <li><a href="bf_vcode_2.php">验证码绕过(on client)</a></li>
        <li><a href="bf_token.php">认证+token</a></li>
    </ul>

</div>
<div id="vul_info">
	<dl>
    	<dt class="vul_title">Burp Force（暴力破解）概述</dt>
        <dd class="vul_detail">
        “暴力破解”是一攻击具手段，在web攻击中，一般会使用这种手段对应用系统的认证信息进行获取。
        其过程就是使用大量的认证信息在认证接口进行尝试登录，直到得到正确的结果。
        为了提高效率，暴力破解一般会使用带有字典的工具来进行自动化操作。
        </dd>
        <dd class="vul_detail">
        理论上来说，大多数系统都是可以被暴力破解的，只要攻击者有足够强大的计算能力和时间，所以断定一个系统是否存在暴力破解漏洞，其条件也不是绝对的。
        我们说一个web应用系统存在暴力破解漏洞，一般是指该web应用系统没有采用或者采用了比较弱的认证安全策略，导致其被暴力破解的“可能性”变高。
        这里的认证安全策略, 包括：</dd>
         <dd class="vul_detail_1">
       
        1.是否要求用户设置复杂的密码；<br />
        2.是否每次认证都使用安全的验证码；<br />
        3.是否对尝试登录的行为进行判断和限制（如：连续5次错误登录，进行账号锁定或IP地址锁定等）；<br />
        4.是否对关键操作使用了安全的token；<br />
        4.是否采用了双因素认证；<br />
        ...等等。<br />
        
        你可以通过“Burp Force”对应的测试栏目，来进一步的了解该漏洞。
    	</dd>
    </dl>
</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>
