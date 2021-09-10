<?php
include "common.php";
$com=$_GET["com"];
$daemon=$$com;
$nowdaemon=$_GET["version"];
$newdaemonname=$daemon."_".getrandom(6);
$run=shell_exec("ps -ef|grep ".$daemon."|grep -v grep");
if(!empty($run)){

echo "<script>alert('Server Has Running,Cannot Change');top.location.href='index.php'</script>";
}else{
if($nowdaemon == $daemon){
 echo "<script>alert('You Cannot Change Using Version');top.location.href='index.php'</script>";
}else{
 shell_exec("sudo mv daemon/".$com."/".$daemon." daemon/".$com."/".$newdaemonname);
 shell_exec("sudo mv daemon/".$com."/".$nowdaemon." daemon/".$com."/".$daemon);
 echo "<script>alert('You have Change Daemon Version');top.location.href='index.php'</script>";
}
}
function getrandom($len, $chars=null)
{
    if (is_null($chars)) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    }
    mt_srand(10000000*(double)microtime());
    for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < $len; $i++) {
        $str .= $chars[mt_rand(0, $lc)];
    }
    return $str;
}

