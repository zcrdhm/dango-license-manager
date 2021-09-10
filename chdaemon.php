<html>
<head>
<link href="jscss/style.css" rel="stylesheet">
</head>
<body style="margin:0px;">
<script type="text/javascript">
function usedaemon(com,version){
    var res=confirm('Sure to Use This version daemon');
    if(res){
            document.daemon.action="usedaemon.php?com=" + com + "&version=" + version;
            document.daemon.submit();
   }
}
</script>
<div class="liclist" style="padding-left:10px"><b>Change Default Daemon Version And Update New Daemon</b></div>
<?php
include "common.php";
$com=$_GET["com"];
$daemon=shell_exec("ls daemon/".$com." -m");
$daemonlist=explode(",",$daemon);
?>
<form name="daemon" method="post">
<?php
for($i=0;$i<count($daemonlist);$i++){

 #echo $daemonlist[$i];
 $daemon=trim($daemonlist[$i]);
 $daemonv=shell_exec("daemon/".$com."/".$daemon." -v|awk '{\$1=\"\";\$2=\"\";\$3=\"\";\$4=\"\";print \$0}'");
 $daemonv=substr($daemonv,"0","54");
 echo "<div class='daemonlist' style='background:#f4f5f5;'><div style='min-width:16%;float:left;padding-left:10px;border-right:1px solid'><b>".$daemon."</b></div><div><b>Daemon:</b>".$daemonv."<input type='submit' value='USE' onclick='usedaemon(\"".$com."\",\"".$daemon."\")'></div></div>";
}
?>
</form>
<div class="liclist">

<form action="upload_newversion.php" method="post" enctype="multipart/form-data" style="float:left">
    <label for="file">Update New Daemon Version : </label>
    <input type="file" name="file" id="file">
    <input type=hidden  name="com" value="<?php echo $com?>">
    <input type="submit" name="submit" class='button' value="Upload">
</form>

</div>
</body>
</html>
