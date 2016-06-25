
<?php 
$inputvalue="";
if(isset($_GET['submit'])){
//     $inputvalue=htmlspecialchars($_GET['inputvalue']);
    $inputvalue=$_GET['inputvalue'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dom型 XSS</title>
<link rel="stylesheet" type="text/css" href="../../style/header.css" />
<link rel="stylesheet" type="text/css" href="../../style/xss.css" />
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

<div id="xssd_main">
	<script>
    function xsstest(){
     var str = document.getElementById("text").value;
     document.getElementById("dom").innerHTML = "<a href='"+str+"'>what do you see?</a>";
    }
    //试试：'><img src="#" onmouseover="alert('xss')">
    //试试：' onclick="alert('xss')">,闭合掉就行
    </script>
    <!--<a href="" onclick=('xss')>-->
    <input id="text" type="text"  value="" />
    <input id="button" type="button" value="click me!" onclick="xsstest()" />
    <div id="dom"></div>
</div>

<div id="right_bar">
	<p class="tips">tips:<br />这里使用了dom方法操作操作了html标签并作了输出,看看源码!</p>
</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>

