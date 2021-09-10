<?php
$com=$_GET['com'];
$log=shell_exec("cat log/".$com.".log");
$logfail=shell_exec("cat log/".$com.".log|grep -E \"Failed|EXIT|Exit\"");
$loggood=shell_exec("cat log/".$com.".log|grep \"Server started on\"");
?>
<p style="white-space:pre-line"><?php echo $log ?></p>
<?php
#if(!empty($logfail)){
#    shell_exec("ps -ef|grep ".$com."|grep -v color|grep -v grep|awk -F ' ' '{print $2}' |xargs sudo  kill -9");
#    echo "<script>alert('License Start bad');window.history.go(-1);</script>";
#}else{
#    echo ("<script type=\"text/javascript\">");
#    echo ("function fresh_page()");
#    echo ("{");
#    echo ("window.location.reload();");
#    echo ("}");
#    echo ("setTimeout('fresh_page()',3000);");
#    echo ("</script>");
#}
#if(!empty($loggood)){
#    echo "<script>alert('License Start good');window.history.go(-1);</script>";
#}else{
#    echo ("<script type=\"text/javascript\">");
#    echo ("function fresh_page()");
#    echo ("{");
#    echo ("window.location.reload();");
#    echo ("}");
#    echo ("setTimeout('fresh_page()',3000);");
#    echo ("</script>");
#
#}
if(empty($logfail) && empty($loggood)){
    echo ("<script type=\"text/javascript\">");
    echo ("function fresh_page()");
    echo ("{");
    echo ("window.location.reload();");
    echo ("}");
    echo ("setTimeout('fresh_page()',3000);");
    echo ("</script>");
}elseif(!empty($logfail)){
    shell_exec("ps -ef|grep ".$com."|grep -v color|grep -v grep|awk -F ' ' '{print $2}' |xargs sudo  kill -9");
    echo "<script>alert('License Start bad');</script>";
    echo "<script>top.location.href='index.php';</script>";
}elseif(!empty($loggood)){
    echo "<script>alert('License Start good');top.location.href='index.php';</script>";
}
?>
