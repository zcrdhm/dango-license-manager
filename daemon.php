<html>
<head>
<link href="jscss/style.css" rel="stylesheet">
</head>
<body style="margin:0px;">
<div class="liclist" style="padding-left:10px"><b>Daemon Version Manage</b></div>
<?php
include "common.php";
$com=shell_exec("ls company -m");
$comnum=shell_exec("ls company|wc -l");
$comlist=explode(",",$com);
?>
<form name="daemon" method="post">
<?php
for($i=0;$i<$comnum;$i++){

 #echo $comlist[$i];
 $daemon=${trim($comlist[$i])};
 $daemonv=shell_exec("daemon/".trim($comlist[$i])."/".$daemon." -v|grep version|awk '{\$1=\"\";\$2=\"\";\$3=\"\";\$4=\"\";print \$0;\$1}'");
 $daemonv=substr($daemonv,"0","54");
 echo "<div class='daemonlist' style='background:#f4f5f5;overflow:hidden'><div style='float:left;min-width:10%;border-right:1px solid;padding-left:10px;'>".trim($comlist[$i])."</div><div style='min-width:10%;float:left;padding-left:10px;border-right:1px solid'><b>".$daemon."</b></div><div><b>Daemon:</b>".$daemonv."<input type='submit' value='Change' onclick='chdaemon(\"".trim($comlist[$i])."\")'></div></div>";
}
?>
</form>
<script type="text/javascript">
function chdaemon(com){
            document.daemon.action="chdaemon.php?com=" + com;
            document.daemon.submit();
}
</script>
</body>
</html>
