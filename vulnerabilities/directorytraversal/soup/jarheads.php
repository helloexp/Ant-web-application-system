
<?php 
$html=<<<A
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cross-Site Scripting</title>
<link rel="stylesheet" type="text/css" href="../../style/header.css"/>
<link rel="stylesheet" type="text/css" href="../../style/dirtra.css"/>
</head>

<body>
<div id="top">
    <h1 class="title">Ant Web Application System</h1>
    <a href="../../index.php">回到首页</a>
</div>

<div id="dt_jarheads">
<pre>
a man has a lots of choices
and these choices made in life are rarely perfect
so he decides to sign a contract
cause h wants to make a difference
he wants to save this world
make it a better place
when that contract is signed he will no longer choose
when he wants to eat, sleep, fuck or fight
those decisions will be made for him
he will be part of something bigger than himself
he will train for 70 consecutive days
and get to know every inch of his m16A4 rifle better then his own dick
then he will go to the desert and fight and die.
why is he fighting? why is he dying?
what's the fucking point?
we're professional fighting men！
we're jarheads！
</pre>

</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>
A;
?>

