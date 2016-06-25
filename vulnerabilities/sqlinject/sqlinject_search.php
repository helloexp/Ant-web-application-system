<?php 
include_once '../../inc/config.inc.php';
include_once '../../inc/mysql.inc.php';
$link=connect();
$html1='';
$html2='';
if(isset($_GET['submit']) && $_GET['name']!=null){
    $name=$_GET['name'];//这里没有做任何处理，直接拼到select里面去了
    $query="select username,id,email from uname where username like '%$name%'";//这里的变量是模糊匹配，需要考虑闭合
    $result=execute($link, $query);
    if(mysqli_num_rows($result)>=1){
        $html2.="<p class='notice'>用户名中含有{$_GET['name']}的结果如下：<br />";
        while($data=mysqli_fetch_assoc($result)){
            $uname=$data['username'];
            $id=$data['id'];
            $email=$data['email'];
            $html1.="<p class='notice'>username：{$uname}<br />uid:{$id} <br />email is: {$email}</p>";
        }   
    }else{
        
        $html1.="<p class='notice'>0o。..没有搜索到你输入的信息！</p>";
    } 
}
?>



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

<div id="sqli_main">
	<p class="sqli_title">请输入用户名进行查找<br />如果记不住用户名，输入用户名的一部分搜索的试试看？</p>
    <form method="get">
    <input class="sqli_in" type="text" name="name" />
    <input class="sqli_submit" type="submit" name="submit" value="搜索" />
    </form>
    <?php echo $html2;echo $html1;?>
</div>
<div id="right_bar">
	<p class="tips">tips:<br />为了看起来像个搜索功能，只能拼了，不要嫌弃!等等？搜索...那因该是模糊匹配</p>
</div>
<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>
