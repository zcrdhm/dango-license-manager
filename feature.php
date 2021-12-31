<html>
<head>
<link href="jscss/style.css" rel="stylesheet">
</head>
<body style="margin:0px;">
<div class="liclist" style="padding-left:10px"><b>License Feature List</b></div>
<?php
include "common.php";
$com=$_POST["com"];
$port=$com."port";
$prorun=shell_exec("ps -ef|grep ".$$com."|grep -v grep");
if(!empty($prorun)){
$lmstat=shell_exec("scl/scl_v2016.12/lmstat -a -c ".$$port."@localhost |grep 'Users of'");
$arrlist=explode("\n",$lmstat);

}
?>
<div style="white-space:pre-line;background: #f4f5f5;border: 1px solid #000;border-radius: 3px;margin:5px;line-height:30px;padding-left: 5px;">
<?php

echo $lmstat;
?>
</div>
</body>
</html>
