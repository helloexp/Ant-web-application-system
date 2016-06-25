<?php
include_once 'inc/config.inc.php';
$dbhost=DBHOST;
$dbuser=DBUSER;
$dbpw=DBPW;
$dbname=DBNAME;
$mes_connect='';
$mes_create='';
$mes_data='';
$mes_ok='';
if(isset($_POST['submit'])){
    //判断数据库连接
    if(!@mysqli_connect($dbhost, $dbuser, $dbpw)){
        exit('数据连接失败，请仔细检查inc/config.inc.php的配置');
    }
    $link=mysqli_connect(DBHOST, DBUSER, DBPW);
    $mes_connect.="<p class='notice'>数据库连接成功!</p>";
    //如果存在,则直接干掉
    $drop_db="drop database if exists $dbname";
    if(!@mysqli_query($link, $drop_db)){
        exit('初始化数据库失败，请仔细检查当前用户是否有操作权限');
    }
    $create_db="CREATE DATABASE $dbname";
    if(!@mysqli_query($link,$create_db)){
        exit('数据库创建失败，请仔细检查当前用户是否有操作权限');
    }
    $mes_create="<p class='notice'>新建数据库成功!</p>";
    //创建数据.选择数据库
    if(!@mysqli_select_db($link, $dbname)){
        exit('数据库选择失败，请仔细检查当前用户是否有操作权限');
    }
    //创建数据.创建表admin和数据
    $creat_admin=
    "CREATE TABLE IF NOT EXISTS `admin` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `username` varchar(30) NOT NULL,
    `pw` varchar(66) NOT NULL,
    `level` int(11) NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4";
    if(!@mysqli_query($link,$creat_admin)){
        exit('创建admin表失败，请仔细检查当前用户是否有操作权限');
    }
    $insert_admin=
    "INSERT INTO `admin` (`id`, `username`, `pw`, `level`) VALUES
    (2, 'user1', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
    (1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 1)";
    if(!@mysqli_query($link,$insert_admin)){
        exit('创建admin表数据失败，请仔细检查当前用户是否有操作权限');
    }
    //创建数据.创建表httpinfo和数据
    $creat_httpinfo=
    "CREATE TABLE IF NOT EXISTS `httpinfo` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `userid` int(10) unsigned NOT NULL,
    `ipaddress` varchar(255) NOT NULL,
     `useragent` varchar(255) NOT NULL,
     `httpaccept` varchar(255) NOT NULL,
    `remoteport` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42";
    if(!@mysqli_query($link,$creat_httpinfo)){
        exit('创建httpinfo表失败，请仔细检查当前用户是否有操作权限');
    }
    //创建数据.创建表message和数据
    $create_message1=
    "CREATE TABLE IF NOT EXISTS `message_1` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
     `content` varchar(255) NOT NULL,
    `time` datetime NOT NULL,
     PRIMARY KEY (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='stored_xss_1' AUTO_INCREMENT=56";
    if(!@mysqli_query($link,$create_message1)){
        exit('创建message1表失败，请仔细检查当前用户是否有操作权限');
    }
    $create_message2=
    "CREATE TABLE IF NOT EXISTS `message_2` (
     `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `content` varchar(255) NOT NULL,
     `time` datetime NOT NULL,
     PRIMARY KEY (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='xss_challenge' AUTO_INCREMENT=6";
    if(!@mysqli_query($link,$create_message2)){
        exit('创建message2表失败，请仔细检查当前用户是否有操作权限');
    }
    $create_message3=
    "CREATE TABLE IF NOT EXISTS `message_3` (
     `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `content` varchar(255) NOT NULL,
    `time` int(11) NOT NULL,
     PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
    if(!@mysqli_query($link,$create_message3)){
        exit('创建message3表失败，请仔细检查当前用户是否有操作权限');
    }
    $create_message4=
    "CREATE TABLE IF NOT EXISTS `message_4` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `time` datetime NOT NULL,
    `content` text NOT NULL,
    `name` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7";
    if(!@mysqli_query($link,$create_message4)){
        exit('创建message3表失败，请仔细检查当前用户是否有操作权限');
    }
    //创建数据.创建表uname和数据
    $create_uname=
    "CREATE TABLE IF NOT EXISTS `uname` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `username` varchar(66) NOT NULL,
    `pw` varchar(128) NOT NULL,
    `sex` char(10) NOT NULL,
    `phonenum` varchar(255) NOT NULL,
    `address` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25";
    if(!@mysqli_query($link,$create_uname)){
        exit('创建uname表失败，请仔细检查当前用户是否有操作权限');
    }
    $insert_uname=
    "INSERT INTO `uname` (`id`, `username`, `pw`, `sex`, `phonenum`, `address`, `email`) VALUES
    (1, 'vince', '21218cca77804d2ba1922c33e0151105', '男', '18626545453', '上海市徐汇区的一个位置', 'vince@ant.com'),
    (2, 'allen', 'e10adc3949ba59abbe56e057f20f883e', '男', '13676767767', '美国NBA 76人队的地方', 'allen@ant.com'),
    (3, 'kobe', 'e10adc3949ba59abbe56e057f20f883e', '男神', '15988767673', '美国洛杉矶湖人队大当家', 'kobe@ant.com'),
    (4, 'grady', 'e10adc3949ba59abbe56e057f20f883e', '男', '13676765545', '美国NBA 魔术队', 'grady@ant.com'),
    (5, 'kevin', 'e10adc3949ba59abbe56e057f20f883e', '男', '13677676754', '美国NAB 雷霆队大当家的地方', 'kevin@ant.com'),
    (6, 'lucy', '96e79218965eb72c92a549dd5a330112', '女', '12345678922', '一个快递员找不到的地方111', 'lucy@ant.com'),
    (7, 'lili', '96e79218965eb72c92a549dd5a330112', '女', '18656565545', '火星', 'lili@ant.com')";
    if(!@mysqli_query($link,$insert_uname)){
        exit('创建uname数据失败，请仔细检查当前用户是否有操作权限');
    }
    $mes_data="<p class='notice'>数据库表和数据创建成功!</p>";
    $mes_ok="<p class='notice'>恭喜你创建成功<a href='index.php'>点击这里</a>进入首页</p>";
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ant Web Application system</title>
<link rel="stylesheet" type="text/css" href="style/header.css"/>
<style>
#install_main{
	width:500px;
	height:350px;
	margin:0 auto;
	margin-top:30px;
}
#install_main .main_title{
	color:#fff;
	margin-top:5px;
	margin-bottom:5px;
}
#install_main .notice{
	color:#fff;
	margin-top:3px;
}
#install_main a{
	color:blue;
	margin-top:3px;
}
#install_main a:hover{
	color:#fff;
	margin-top:3px;
}

</style>
</head>
<body>
<div id="top">
<h1 class="title">欢迎安装“Ant Web Application System”</h1>
</div>

<div id=install_main>
<p class="main_title">Setup guide:</p>
<p class="main_title">第0步：请提前安装“mysql+php+中间件”的环境;</p>
<p class="main_title">第一步：请根据实际环境修改inc/config.inc.php文件里面的参数;</p>
<p class="main_title">第二步：点击“安装/初始化”按钮;</p>
<form method="post">
    <input type="submit" name="submit" value="安装/初始化"/>
</form>
<?php 
echo $mes_connect;
echo $mes_create;
echo $mes_data;
echo $mes_ok;
?>
</div>
<div id="bottom">
<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>
</body>
</html>