<?php
include("common.php");
$sclv=$_POST["sclv"];
$com=$_POST["com"];
$licpath="license/".$com."_start.lic";
$res=shell_exec("sudo ".$_SERVER['DOCUMENT_ROOT']."/scl/".$sclv."/lmdown -c ".$_SERVER['DOCUMENT_ROOT']."/".$licpath." -q");
if((strpos($res,'shut down') !== false)){
    echo "<script>alert('License is shut down');</script>";
    echo "<script>top.location.href='index.php'</script>";
  }
?>
