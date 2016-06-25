<?php 
include_once '../../inc/config.inc.php';
include_once '../../inc/mysql.inc.php';
$link=connect();

$html="";

if(isset($_POST['submit'])){  
    if(empty($_POST['username'])){
        $html.="<p class='notice'>用户名不能为空</p>"; 
    }else {
        if(empty($_POST['password'])){
            $html.="<p class='notice'>密码不能为空</p>";
        }
    }
    $username=escape($link, $_POST['username']);
    $password=escape($link, $_POST['password']);
    $query="select * from uname where username='$username' and pw=md5('$password')";
    $result=execute($link, $query);
        if(mysqli_num_rows($result)==1){
            $html.="<p class='notice'>$username,你好,login success！</p>";
        }else{
            $html.="<p class='notice'>Login failed!</p>";
        }
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Burt Force</title>
<link rel="stylesheet" type="text/css" href="../../style/header.css" />
<link rel="stylesheet" type="text/css" href="../../style/bf.css" />
<style type="text/css">
.code {
background-color:#9A9A9A;
font-family: Arial;
font-style: italic;
color: #fff;
border: 0;
padding: 2px 3px;
letter-spacing: 3px;
font-weight: bolder;
}
.unchanged {
border: 0;
}
</style>
<script language="javascript" type="text/javascript"> 
var code; //在全局 定义验证码  
function createCode() {
  code = "";
  var codeLength = 5;//验证码的长度  
  var checkCode = document.getElementById("checkCode");
  var selectChar = new Array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');//所有候选组成验证码的字符，当然也可以用中文的  
  
  for (var i = 0; i < codeLength; i++) {
    var charIndex = Math.floor(Math.random() * 36);
    code += selectChar[charIndex];
  }
  //alert(code);
  if (checkCode) {
    checkCode.className = "code";
    checkCode.value = code;
  }
}

function validate() {
  var inputCode = document.querySelector('#bf_main .vcode').value;
  if (inputCode.length <= 0) {
    alert("请输入验证码！");
    return false;
  } else if (inputCode != code) {
    alert("验证码输入错误！");
    createCode();//刷新验证码  
    return false;
  } 
  else {
  return true;
  }
}
</script>
</head>

<body onload="createCode()">
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
<div id="bf_main">
	<p class="tips">还是有验证码，管用吗？</p>
    <p class="bf_title">用户登录</p>
	<form class="bf_form" method="post" onsubmit="return validate();">
    	<label>用户名：<input class="username" name="username" type="text" /></label><br />
        <label>密&nbsp;&nbsp;&nbsp;码：<input class="passowrd" name="password" type="password" /></label><br />
        <label>验证码：<input class="vcode" name="vcode" placeholder="输入下面的验证码" type="text" /></label><br />
        <label><input type="text" onclick="createCode()" readonly="readonly" id="checkCode" class="unchanged" style="width: 100px" /></label><br />
        <label><input class="submit"  name="submit" type="submit" value="Login" /></label>
    </form>
    <?php 
    echo $html;
    ?>
</div>
<div id="right_bar">
	<p class="tips">tips:<br />仔细看看，这里的验证码好像是在JS里面搞的，JS????</p>
</div>
<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>