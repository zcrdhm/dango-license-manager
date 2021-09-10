<html>
<head>
<link href="jscss/style.css" rel="stylesheet">
</head>
<body style="margin:0px;">
<?php
include "common.php";
$com=shell_exec("ls company -m");
$comnum=shell_exec("ls company|wc -l");
$comlist=explode(",",$com);
for($i=0;$i<$comnum;$i++){
$licstatus=shell_exec("ps -ef|grep ".trim($comlist[$i])."|grep -v color|grep -v grep");
if(!empty($licstatus)){
echo "<div class='comlist'><a href=/company.php?com=".trim($comlist[$i])." target=con style='margin:0 10px;text-decoration:none'>".ucfirst(trim($comlist[$i]))."</a><img src='jscss/run.gif' width=20px;></br></div>";
}else{

echo "<div class='comlist'><a href=/company.php?com=".trim($comlist[$i])." target=con style='margin:0 10px;text-decoration:none'>".ucfirst(trim($comlist[$i]))."</a><img src='jscss/norun.gif' width=20px;></br></div>";
}
}
echo "<div class='comlist'><a href='/manage.php' target=con style='margin:0 10px;text-decoration:none;'>Manage</a><img src='jscss/setting.gif' width=20px;></br></div>";
echo "<div class='comlist'><a href='/scl.php' target=con style='margin:0 10px;text-decoration:none;'>Flexlm</a><img src='jscss/setting.gif' width=20px;></br></div>";
echo "<div class='comlist'><a href='/daemon.php' target=con style='margin:0 10px;text-decoration:none;'>Daemon</a><img src='jscss/setting.gif' width=20px;></br></div>";
?>
</body>
</html>
