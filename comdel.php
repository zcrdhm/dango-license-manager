<?php
include "common.php";
$com=$_GET["com"];
$start=shell_exec("ps -ef|grep ".$$com."|grep -v grep");
if(!empty($start)){
echo "<script>alert('License is Running,You can not delete it!');top.location.href='index.php';</script>";

}else{
shell_exec("sudo rm -rf company/".$com);
shell_exec("sudo rm -rf daemon/".$com);
shell_exec("sudo sed -i '/\$".$com."=/d' setting.php");
shell_exec("sudo sed -i '/\$".$com."port=/d' setting.php");
echo "<script>alert('Company Delete success!');top.location.href='index.php';</script>";
}
?>

