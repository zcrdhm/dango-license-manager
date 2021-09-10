<html>
<head>
<link href="jscss/style.css" rel="stylesheet">
</head>
<body style="margin:0px;">
<div class="liclist" style="padding-left:10px"><b>License Used Check</b></div>
<?php
include "common.php";
$com=$_POST["com"];
$port=$com."port";
$prorun=shell_exec("ps -ef|grep ".$$com."|grep -v grep");
if(!empty($prorun)){
$lmstat=shell_exec("scl/scl_v2016.12/lmstat -a -c ".$$port."@localhost|grep -n Users|awk -F \":\" '{print $1}'");
$arrlist=explode("\n",$lmstat);
#var_dump($arrlist);
for($i=1;$i<count($arrlist)-1;$i++){
 $cha=$arrlist[$i]-$arrlist[$i-1];
 if($cha != "2"){
   $start=$arrlist[$i-1];
   $end=$arrlist[$i]-1;
   $line=$end-$start;
   $nowused=shell_exec("scl/scl_v2016.12/lmstat -a -c ".$$port."@localhost|sed -n '".$start.",".$end."p'|grep -v \"^$\"|grep -E \"Users|start\"");
   #$nowused="<div class='daemonlist'>".$nowused."</div>";
   $alluse = $alluse.$nowused;
  }

}
#$lmstat=shell_exec("scl/scl_v2016.12/lmstat -a -c ".$$port."@localhost|grep -v \"Total of 0 licenses in use\"|grep -v Error|grep -v \"^$\"");
}
?>
<div style="white-space:pre-line;background: #f4f5f5;border: 1px solid #000;border-radius: 3px;margin:5px;line-height:30px;padding-left: 5px;">
<?php
if(!empty($alluse)){
 echo $alluse;
}else{
 echo "No License Used Now!";
}

?>

</div>
</body>
</html>
