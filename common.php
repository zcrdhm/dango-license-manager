<?php
header('Content-type:text/html; charset=utf-8');
 session_start();
 if (isset($_COOKIE['username'])) {
 $_SESSION['username'] = $_COOKIE['username'];
 $username=$_SESSION['username'];
 $_SESSION['islogin'] = 1;
 }
 if (isset($_SESSION['islogin'])) {
    include "setting.php";
    $hostname=str_replace(PHP_EOL, '',shell_exec("hostname"));
    $hostid=str_replace(PHP_EOL, '',shell_exec('scl/scl_v2016.12/lmhostid |grep machine|sed \'s/\"//g\'|awk -F " " \'{print $9}\''));
 } else {
echo "<script>window.parent.location.href='login.php'</script>";
 }

?>
