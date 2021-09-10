<?php
include "common.php";
$com=$_POST["com"];
$daemonname=$$com;
$newdaemonname=$daemonname."_".getrandom(6);
$run=shell_exec("ps -ef|grep ".$daemonname."|grep -v grep");
if(!empty($run)){
echo "<script>alert('Server Has Running');top.location.href='index.php'</script>";
}else{
if ($_FILES["file"]["type"] == "application/octet-stream"){
if ($_FILES["file"]["error"] > 0)
{
 echo "Error" . $_FILES["file"]["error"] . "<br>";
}
else{
 shell_exec("sudo mv daemon/".$com."/".$daemonname." daemon/".$com."/".$newdaemonname);
 move_uploaded_file($_FILES["file"]["tmp_name"],"daemon/".$com."/".$daemonname);
 shell_exec("sudo chmod 777 daemon/".$com."/".$daemonname);
 #echo $_FILES["file"]["tmp_name"];
}
echo "<script>alert('Success Change daemon');top.location.href='index.php'</script>";
}

#echo "<script>alert('Success Build $newcom');top.location.href='index.php'</script>";
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

?>
