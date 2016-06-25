<?php 
include_once '../../inc/config.inc.php';
include_once '../../inc/mysql.inc.php';
$link=connect();
$html='';

if(isset($_GET['submit']) && $_GET['name']!=null){
    $name=$_GET['name'];//这里没有做任何处理，直接拼到select里面去了
    $query="select id,email from uname where username='$name'";//这里的变量是字符型，需要考虑闭合
    $result=execute($link, $query);
    if(mysqli_num_rows($result)>=1){
        while($data=mysqli_fetch_assoc($result)){
            $id=$data['id'];
            $email=$data['email'];
            $html.="<p class='notice'>your uid:{$id} <br />your email is: {$email}</p>";
        }   
    }else{
        
        $html.="<p class='notice'>您输入的username不存在，请重新输入！</p>";
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
	<p class="sqli_title">what's your username?</p>
    <form method="get">
    <input class="sqli_in" type="text" name="name" />
    <input class="sqli_submit" type="submit" name="submit" value="查询" />
    </form>
    <?php echo $html;?>
</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>
