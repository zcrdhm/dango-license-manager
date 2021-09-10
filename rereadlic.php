<?php
include("common.php");
$sclv=$_POST["sclv"];
$com=$_POST["com"];
$new=$com."port";
$port=$$new;
$liclist=$_POST["choose"];
$choosenum=count($liclist);
if($choosenum < 1){
echo "<script>alert('You must choose one license file at last');window.history.go(-1);</script>";
}else{
$licpath="license/".$com."_start.lic";
shell_exec("sudo touch  option/".$com.".option");
shell_exec("cat /dev/null > license/".$com."_start.lic");
shell_exec("echo 'SERVER ".$hostname." ".$hostid." ".$port."' >> license/".$com."_start.lic");
shell_exec("echo 'VENDOR ".$$com." ".$_SERVER['DOCUMENT_ROOT']."/daemon/".$com."/".$$com." option=".$_SERVER['DOCUMENT_ROOT']."/option/".$com.".option' >> license/".$com."_start.lic");
shell_exec("echo 'USE_SERVER' >> license/".$com."_start.lic");
for($i=0;$i<$choosenum;$i++){
shell_exec("cat company/".$com."/".$liclist[$i]." |grep -v ^# |grep -v ^SERVER|grep -v USE_SERVER|grep -v ^VENDOR|grep -v DAEMON >> license/".$com."_start.lic");
}
$res=shell_exec("sudo ".$_SERVER['DOCUMENT_ROOT']."/scl/".$sclv."/lmreread -c ".$_SERVER['DOCUMENT_ROOT']."/".$licpath);
if((strpos($res,'successful') !== false)){
    echo "<script>alert('License is reread successful');</script>";
    echo "<script>window.history.go(-1);</script>";
  }
}
?>
