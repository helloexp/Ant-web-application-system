<?php 
include_once '../../../inc/config.inc.php';
include_once '../../../inc/mysql.inc.php';
include_once '../../../inc/function.php';
$link=connect();
$html='';
if(array_key_exists("message",$_POST) && $_POST['message']!=null){
    $message=escape($link, $_POST['message']);//插入转义
    $query="insert into message_3(content,time) values('$message',now())";
    $result=execute($link, $query);
    if(mysqli_affected_rows($link)!=1){
        $html.="<p>出现异常，提交失败！</p>";
    }
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sql Inject</title>
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
        <li><a href="../sqlinjectiu/iu_login.php">“insert/update”注入</a></li>
        <li><a href="sqli_del.php">“delete”注入</a></li>
        <li><a href="../sqlinjecthttp/http_header.php">http头注入</a></li>
        <li><a href="sqlinject_blind_b.php">盲注（base on boolian）</a></li>
        <li><a href="sqlinject_blind_t.php">盲注（base on time）</a></li>
    </ul>
</div>

<div id="sqli_del_main">
	<p class="sqli_del_title">我是一个留言板：</p>
    <form method="post">
    <textarea class="sqli_del_in" name="message"></textarea><br />
    <input class="sqli_del_submit" type="submit" name="submit" value="submit" />
    </form>
    <div id="show_message">
    	<p class="line">留言列表：</p>
        <?php echo $html;?>
        <?php 
        $query="select * from message_3";
        $result=execute($link, $query);
        while($data=mysqli_fetch_assoc($result)){
            $content=htmlspecialchars($data['content']);//输出转义，防XSS
            echo "<p class='con'>{$content}</p><a href='message_del.php?id={$data['id']}'>删除</a>";       
        }
        ?>
    </div>
</div>

<div id="right_bar">
	<p class="tips">tips:<br />当然也得搞得定delete..<br />试试看?</p>
</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:hanlu@outlook.com</p>
</div>

</body>
</html>
