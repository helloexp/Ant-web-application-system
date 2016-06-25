<?php
include_once '../../../inc/config.inc.php';
include_once '../../../inc/mysql.inc.php';
include_once '../../../inc/function.php';
$link=connect();
// 判断是否登录，没有登录不能访问
if(!check_op_login($link)){
    skip('你没有登录，无权访问会员中心，请登录', 'overadmin.php');
}
$html='';
if(isset($_GET['submit']) && $_GET['username']!=null){
    $username=escape($link, $_GET['username']);//没有使用session来校验,而是使用的传进来的值，权限校验出现问题
    $query="select * from uname where username='$username'";
    $result=execute($link, $query);
    if(mysqli_num_rows($result)==1){
        $data=mysqli_fetch_assoc($result);
        $uname=$data['username'];
        $sex=$data['sex'];
        $phonenum=$data['phonenum'];
        $add=$data['address'];
        $email=$data['email'];
        
$html.=<<<A
<div id="per_info">
   <h1 class="per_title">hello,{$uname},你的具体信息如下：</h1>
   <p class="per_name">姓名:{$uname}</p>
   <p class="per_sex">性别:{$sex}</p>
   <p class="per_phone">手机号:{$phonenum}</p>    
   <p class="per_add">住址:{$add}</p> 
   <p class="per_email">邮箱地址:{$email}</p> 
</div>
A;
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


<div id="mem_main">
<p class="mem_title">欢迎来到个人信息中心  | <a style="color:bule;" href="op_logout.php">退出登录</a></p>
    <form class="msg1" method="get">
        <input type="hidden" name="username" value="<?php echo $_SESSION['op']['username']; ?>" />
        <input type="submit" name="submit" value="点击查看个人信息" />
    </form>
    <?php echo $html;?>

</div>


<div id="bottom">
<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>
