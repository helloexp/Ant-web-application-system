
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cross-Site Scripting</title>
<link rel="stylesheet" type="text/css" href="../../style/header.css"/>
<link rel="stylesheet" type="text/css" href="../../style/usd.css"/>
</head>

<body>
<div id="top">
    <h1 class="title">Ant Web Application System</h1>
    <a href="../../index.php">回到首页</a>
</div>
<div id="left_bar">
	<h2 class="left_title">Unsafe file download</h2>
    <ul class="left_list">
    	<li><a href="download.php">不安全的文件下载漏洞概述</a></li>
        <li><a href="unsafe_down.php">Unsafe download</a></li>
    </ul>
</div>

<div id="usd_main">
    <p class="title">NBA 1996年   黄金一代</p>
    <p class="mes">Notice:点击球员名字即可下载头像图片！</p>
    <div class="png">
        <img src="download/kb.png" />
        <a href="execdownload.php?filename=kb.png" >科比.布莱恩特</a>
    </div>
    
    <div class="png">
        <img src="download/ai.png" />
        <a href="execdownload.php?filename=ai.png" >阿伦.艾弗森</a>
    </div>
    
    <div class="png">
        <img src="download/ns.png" />
        <a href="execdownload.php?filename=ns.png" >史蒂夫.纳什</a>
    </div>
    
    <div class="png">
        <img src="download/rayal.png" />
        <a href="execdownload.php?filename=rayal.png" >雷.阿伦</a>
    </div>
    

    <div class="png">
        <img src="download/mbl.png" />
        <a href="execdownload.php?filename=mbl.png" >斯蒂芬.马布里</a>
    </div>
    
    <div class="png">
        <img src="download/camby.png" />
        <a href="execdownload.php?filename=camby.png" >马库斯.坎比</a>
    </div>
    
    <div class="png">
        <img src="download/pj.png" />
        <a href="execdownload.php?filename=pj.png" >斯托贾科维奇</a>
    </div>
    
    <div class="png">
        <img src="download/bigben.png" />
        <a href="execdownload.php?filename=bigben.png" >本.华莱士</a>
    </div>
    
    <div class="png">
        <img src="download/sks.png" />
        <a href="execdownload.php?filename=sks.png" >伊尔戈斯卡斯</a>
    </div>

    <div class="png">
        <img src="download/oldfish.png" />
        <a href="execdownload.php?filename=oldfish.png" >德里克.费舍尔</a>
    </div>
    
    <div class="png">
        <img src="download/smallane.png" />
        <a href="execdownload.php?filename=smallane.png" >杰梅因.奥尼尔</a>
    </div>
    
    <div class="png">
        <img src="download/lmx.png" />
        <a href="execdownload.php?filename=lmx.png" >阿卜杜.拉希姆</a>
    </div>
</div>

<div id="right_bar">
	<p class="tips">tips:<br />96黄金一代,都老了....唉，我的青春..<br />伤感！这道题不给提示了！</p>
</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>