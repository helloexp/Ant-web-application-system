<?php
if(isset($_GET['title'])){
    $filename=$_GET['title'];
    require "soup/$filename";
    echo $html;
}

?>