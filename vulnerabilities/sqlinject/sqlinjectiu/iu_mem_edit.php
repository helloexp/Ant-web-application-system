<?php 
include_once '../../../inc/config.inc.php';
include_once '../../../inc/mysql.inc.php';
include_once '../../../inc/function.php';
$link=connect();
$is_login_id=check_sqli_login($link);
if(!$is_login_id){
    skip('你没有登录，请登录后在访问会员中心', 'iu_login.php');
}

if(isset($_POST['submit'])){
    if($_POST['sex']!=null && $_POST['phonenum']!=null && $_POST['add']!=null && $_POST['email']!=null){
//      $getdata=escape($link, $_POST);//转义,不转，会有发生在update下的Sql注入漏洞 
        $getdata=$_POST;//没转义
        $query="update uname set sex='{$getdata['sex']}',phonenum='{$getdata['phonenum']}',address='{$getdata['add']}',email='{$getdata['email']}' where id='$is_login_id'";
        $result=execute($link, $query);
        if(mysqli_affected_rows($link)==1 || mysqli_affected_rows($link)==0){//没有修改，点击提交，也算修改成功
            skip('修改成功', 'iu_mem.php');
        }else {
            skip('修改失败，请重试', 'iu_mem.php');

        }
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

<?php 
//如果前面检查成功，则函数会返回$is_login_id=$data['id']，然后拿到ID后可以查询
$query="select * from uname where id='$is_login_id'";//查询该用户在数据库里面的信息
$result=execute($link, $query);
$data=mysqli_fetch_array($result, MYSQL_ASSOC);
$name=$data['username'];
$sex=$data['sex'];
$phonenum=$data['phonenum'];
$add=$data['address'];
$email=$data['email'];

$html=<<<A
<div id="per_info">
   <form method="post">
   <h1 class="per_title">hello,{$name},欢迎来到个人会员中心 | <a style="color:bule;" href="iu_logout.php">退出登录</a></h1>
   <p class="per_name">用户名:{$name}</p>
   <p class="per_sex">性别:<input class="sex" type="text" name="sex" value="{$sex}"/></p>
   <p class="per_phone">手机号:<input class="phonenum" type="text" name="phonenum" value="{$phonenum}"/></p>    
   <p class="per_add">住址:<input class="add" type="text" name="add" value="{$add}"/></p> 
   <p class="per_email">邮箱地址:<input class="email" type="text" name="email" value="{$email}"/></p> 
   <input class="sub" type="submit" name="submit" value="submit"/>
   </form>
</div>
A;
echo $html;
?>


<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>
