<?php
include_once '../../../inc/config.inc.php';
include_once '../../../inc/mysql.inc.php';
include_once '../../../inc/function.php';
$link=connect();
// 判断是否登录，没有登录不能访问
if(!check_op2_login($link)){//这里只是验证了登录状态，并没有验证级别，所以存在越权问题。
    skip('你没有登录，无权管理中心，请登录', 'overadmin.php');
}
if(isset($_POST['submit'])){
    if($_POST['username']!=null && $_POST['password']!=null){//用户名密码必填
        $getdata=escape($link, $_POST);//转义
        $query="insert into uname(username,pw,sex,phonenum,email,address) values('{$getdata['username']}',md5('{$getdata['password']}'),'{$getdata['sex']}','{$getdata['phonenum']}','{$getdata['email']}','{$getdata['address']}')";
        $result=execute($link, $query);
        if(mysqli_affected_rows($link)==1){//判断是否插入
            skip('添加成功', 'op_admin.php');
        }else {
            skip('修改失败，请重试', 'op_admin.php');

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
<link rel="stylesheet" type="text/css" href="../../../style/op.css"/>
</head>

<body>
<div id="top">
<h1 class="title">Ant Web Application System</h1>
<a href="../../../index.php">回到首页</a>
</div>

<div id="admin_left">
    <p class="left_title">用户管理</p>
    <ul>
        <li><a href="op_admin.php">查看用户列表</a></li>
        <li><a href="op_admin_edit.php">添加用户</a></li>
    </ul>
   
</div>

<div id="edit_main">
<p class="edit_title">hi,<?php echo $_SESSION['op2']['username']?>,欢迎来到后台管理中心 | <a style="color:bule;" href="op_logout.php">退出登录</a></p>

<form class="from_main" method="post">
    <label>用户名:<br /><input type="text" name="username" placeholder="必填"/></label><br />
    <label>密码:<br /><input type="password" name="password" placeholder="必填"/></label><br />
    <label>性别:<br /><input type="text" name="sex" /></label><br />
    <label>电话号码:<br /><input type="text" name="phonenum" /></label><br />
    <label>邮箱:<br /><input type="text" name="email" /></label><br />
    <label>地址:<br /><input type="text" name="address" /></label><br />
    <input class="sub" type="submit" name="submit" value="创建" />
</form>


</div>

<div id="bottom">
<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>
