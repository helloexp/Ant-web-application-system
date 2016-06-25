<?php
include_once '../config.inc.php';
include_once '../mysql.inc.php';
$link=connect();
$html='';
$referer=$_SERVER['HTTP_REFERER'];
if(array_key_exists('id', $_GET) && is_numeric($_GET['id'])){//判断是否为数字，安全策略
    $query="delete from message_2 where id={$_GET['id']}";
    $result=execute($link, $query);
    if(mysqli_affected_rows($link)==1){
        $html.="<p id='op_notice'>删除成功,正在往回跳转 | <a href='$referer'>点击快速返回</a></p>";
    }else{
        $html.="<p id='op_notice'>删除失败,请重试，正在往回跳转 | <a href='$referer'>点击快速返回</a></p>";
    
    }
    
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="2;URL=../../vulnerabilities/xss/xss_challenge.php" />
<title>操作提示</title>
<link rel="stylesheet" type="text/css" href="../../style/header.css"/>
</head>
<body>
<?php echo $html; ?>

</body>
</html>