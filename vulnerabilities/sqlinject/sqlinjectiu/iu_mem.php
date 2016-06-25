<?php 
include_once '../../../inc/config.inc.php';
include_once '../../../inc/mysql.inc.php';
include_once '../../../inc/function.php';
$link=connect();

$is_login_id=check_sqli_login($link);
if(!$is_login_id){
    skip('你没有登录，请登录后在访问会员中心', 'iu_login.php');
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
   <h1 class="per_title">hello,{$name},欢迎来到个人会员中心 | <a style="color:bule;" href="iu_logout.php">退出登录</a></h1>
   <p class="per_name">姓名:{$name}</p>
   <p class="per_sex">性别:{$sex}</p>
   <p class="per_phone">手机号:{$phonenum}</p>    
   <p class="per_add">住址:{$add}</p> 
   <p class="per_email">邮箱地址:{$email}</p> 
   <a class="edit" href="iu_mem_edit.php">修改个人信息</a>
</div>
A;
echo $html;
?>


<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>
