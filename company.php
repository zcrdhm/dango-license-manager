<html>
<head>
<link href="jscss/style.css" rel="stylesheet">
</head>
<?php
include "common.php";
$com=$_GET["com"];
$lic=shell_exec("ls company/".$com."/ -m");
$licnum=shell_exec("ls company/".$com."/|wc -l");
$liclist=explode(",",$lic);
$licstatus=shell_exec("ps -ef|grep ".$$com."|grep -v color|grep -v grep");
if(!empty($licstatus)){
$disable="disabled=\"disabled\" style=\"background: rgba(0,133,208,.1);color:#000;border: none!important;\"";
$lmgrd=shell_exec("ps -ef|grep ".$com."|grep -v color|grep -v grep|grep log");
$lmv=get_sub_content($lmgrd,"/scl/","/lmgrd");
}else{
$stopdis="disabled=\"disabled\" style=\"background: rgba(0,133,208,.1);color:#000;border: none!important;\"";
}
function get_sub_content($str, $start, $end){ 
    if ($start == '' || $end == ''){ 
           return; 
    } 
    $str = explode($start, $str); 
    $str = explode($end, $str[1]); 
    $strs=preg_replace("/<a href=\/ target=_blank>(.*)<\/a>/Ui","\$2",$str[0]); 
   return $strs; 
} 
?>
<script type="text/javascript">
function start(){
    document.go.action="startlic.php";
    document.go.submit();
}

function reread(){
    var res=confirm('Sure to reread license');
    if(res){
	    document.go.action="rereadlic.php";
    	    document.go.submit();
	}
}

function stop(){
    var res=confirm('Sure to Shutdown license');
    if(res){
            document.go.action="stoplic.php";
            document.go.submit();
        }

}
function del(){
    var res=confirm('Sure to Delete this license file');
    if(res){
            document.go.action="dellic.php";
            document.go.submit();
        }

}

function seelog(){
    document.go.action="seelog.php";
    document.go.submit();
}
function option(){
    document.go.action="option.php";
    document.go.submit();
}
function used(){
    document.go.action="used.php";
    document.go.submit();
}
</script>

<div class="liclist">
<div class="liclistq" style="text-align:center;">
&#9744
</div>
<div class="liclisto" style='font-weight:bold;padding-left:30px;'>
License Name (Licensename-date-random.filetype).Default Port:<?php echo ${$com."port"};?>
</div>
</div>
<form name="go" method="POST">
<div style="margin:5px;">
<?php
if($licnum>0){
for($i=0;$i<$licnum;$i++){
echo "<div class='liclistn'><input type=checkbox name=\"choose[]\" value=".trim($liclist[$i])." style='margin-top:10px;'></div><div class='liclistm' style='padding-left:30px;' >".trim($liclist[$i])."</br></div>";
}
}else{
  echo "<div class='liclistm'>No License File!!! You need Upload!!!</div>";
}

$scl=shell_exec("ls scl/ -m");
$sclnum=shell_exec("ls scl|wc -l");
$scllist=explode(",",$scl);
?>
</div>
<select name="sclv">
<?php
for($i=0;$i<$sclnum;$i++){
$moren="selected=\"selected\"";
if(trim($scllist[$i]) == $lmv){
    echo "<option  value=".trim($scllist[$i])." ".$moren.">".trim($scllist[$i])."</option>";
}else{
    echo "<option  value=".trim($scllist[$i]).">".trim($scllist[$i])."</option>";
}
}
?>
</select>

<input type=hidden  name="com" value="<?php echo $com?>">
<input type=button class='button' value="StartLic" <?php echo $disable ?> onclick="start()">
<input type=button class='button' value="RereadLic" <?php echo $stopdis ?>  onclick="reread()">
<input type=button class='button' value="StopLic" <?php echo $stopdis ?> onclick="stop()">
<input type=button class='button' value="SeeLog" onclick="seelog()">
<input type=button class='button' value="Option" <?php echo $stopdis ?> onclick="option()">
<input type=button class='button' value="Used" <?php echo $stopdis ?> onclick="used()">
<input type=button class='button' value="Del" <?php echo $disable ?> onclick="del()">
</form>

<div class="liclist">

<form action="upload_license.php" method="post" enctype="multipart/form-data" style="float:left">
    <label for="file">Update License File : </label>
    <input type="file" name="file" id="file">
    <input type=hidden  name="com" value="<?php echo $com?>">
    <input type="submit" name="submit" class='button' value="Upload">
</form>

</div>
<script language="javascript">
function sumbit_sure(){
var gnl=confirm("Sure to reread license?");
if (gnl==true){
return true;
}else{
return false;
}
}
< /script>
