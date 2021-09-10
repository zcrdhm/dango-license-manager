<html>
<head>
<link href="jscss/style.css" rel="stylesheet">
</head>
<body style="margin:0px;">
<div class="liclist" style="padding-left:10px"><b>Flexlm Scl Version Manage</b></div>
<?php
include "common.php";
$scl=shell_exec("ls scl -m");
$scllist=explode(",",$scl);
$sclnum=count($scllist);
?>
<form name="scl" method="post">
<?php
for($i=0;$i<$sclnum;$i++){
 $scl=trim($scllist[$i]);
 $sclv=shell_exec("scl/".trim($scllist[$i])."/lmgrd -v|awk '{\$1=\"\";print \$0;\$1}'");
 #$daemonv=substr($daemonv,"0","54");
 echo "<div class='daemonlist' style='background:#f4f5f5;overflow:hidden'><div style='float:left;min-width:10%;border-right:1px solid;padding-left:10px;'><b>".$scl."</b></div><div><b>Version:</b>".$sclv."<input type='submit' value='DEL' onclick='delscl(\"".trim($scllist[$i])."\")'></div></div>";
}
?>
</form>

<div class="liclist">

<form action="upload_scl.php" method="post" enctype="multipart/form-data" style="float:left">
    <label for="file">Update Flexlm File : </label>
    <input type="file" name="file" id="file">
    <input type="submit" name="submit" class='button' value="Upload">
</form>

</div>


<script type="text/javascript">
function delscl(com){
var res=confirm('Sure to Delete This Flexlm Version');
    if(res){
            document.scl.action="delscl.php?version=" + com;
            document.scl.submit();
}
}
</script>
</body>
</html>
