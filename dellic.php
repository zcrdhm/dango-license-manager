<?php
include("common.php");
$com=$_POST["com"];
$liclist=$_POST["choose"];
$choosenum=count($liclist);
$delpath="license/".$com."/";

for($i=0;$i<$choosenum;$i++){
#echo $liclist[$i];
shell_exec("sudo rm -rf  company/".$com."/".$liclist[$i]);
}
echo "<script>alert('License is reread successful');window.history.go(-1);</script>";
?>
