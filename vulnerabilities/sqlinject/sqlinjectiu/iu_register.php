<?php 
include_once '../../../inc/config.inc.php';
include_once '../../../inc/mysql.inc.php';
include_once '../../../inc/function.php';
$link=connect();
$is_login_id=check_sqli_login($link);
if($is_login_id){
    skip('你已经登录，请退出后，在来注册哦', 'iu_mum.php');
}

if(isset($_POST['submit'])){
    if($_POST['username']!=null &&$_POST['password']!=null){
//      $getdata=escape($link, $_POST);//转义 
        $getdata=$_POST;//没转义,导致注入漏洞
        $query="insert into uname(username,pw,sex,phonenum,email,address) values('{$getdata['username']}',md5('{$getdata['password']}'),'{$getdata['sex']}','{$getdata['phonenum']}','{$getdata['email']}','{$getdata['add']}')";
        $result=execute($link, $query);
        if(mysqli_affected_rows($link)==1){
            skip('注册成功，请返回到登录界面登录', 'iu_login.php');
        }else {
            skip('注册失败，请重试', 'iu_register.php');

        }
    }else{
            skip('必填项不能为空哦', 'iu_register.php');
    }
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cross-site request forgery</title>
<link rel="stylesheet" type="text/css" href="../../../style/header.css"/>
<link rel="stylesheet" type="text/css" href="../../../style/sqli.css"/>
</head>

<body>
<div id="top">
    <h1 class="title">Ant Web Application System</h1>
    <a href="../../../index.php">回到首页</a>
</div>
<div id="left_bar">
	<h2 class="left_title">Sql Inject</h2>
    <ul class="left_list">
  		<li><a href="../sqlinject.php">Sql Inject（SQL注入）概述</a></li>
        <li><a href="../sqlinject_id.php">数字型注入(post)</a></li>
        <li><a href="../sqlinject_str.php">字符型注入(get)</a></li>
        <li><a href="../sqlinject_search.php">搜索型注入</a></li>
        <li><a href="../sqlinject_xxx.php">xxx型注入</a></li>
        <li><a href="iu_login.php">“insert/update”注入</a></li>
        <li><a href="../sqlinjectdel/sqli_del.php">“delete”注入</a></li>
        <li><a href="../sqlinjecthttp/http_header.php">http头注入</a></li>
        <li><a href="../sqlinject_blind_b.php">盲注（base on boolian）</a></li>
        <li><a href="../sqlinject_blind_t.php">盲注（base on time）</a></li>
    </ul>
</div>

<div id="reg_info">
   <form method="post">
   <h1 class="reg_title">欢迎注册，请填写下面信息!</h1>
   <p class="reg_name">用户名:<input class="r_username" type="text" name="username" placeholder="必填" /></p>
    <p class="reg_name">密码:<input class="r_username" type="text" name="password" placeholder="必填" /></p>
   <p class="reg_sex">性别:<input class="r_sex" type="text" name="sex"  /></p>
   <p class="reg_phone">手机号:<input class="r_phonenum" type="text" name="phonenum"  /></p>    
   <p class="reg_email">邮箱地址:<input class="r_email" type="text" name="email"  /></p>
   <p class="reg_add">住址:<input class="r_add" type="text" name="add"  /></p> 
   <input class="sub" type="submit" name="submit" value="submit"/>
   </form>
</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>
