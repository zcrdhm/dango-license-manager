<html>
<head>
<link href="jscss/style.css" rel="stylesheet">
</head>
<body>
<?php
$com=$_POST['com'];
$log=shell_exec("cat log/".$com.".log|tail -n 100");
#$log=shell_exec("cat log/".$com.".log|grep -E \"OUT:|IN:\"|tail -n 30");
#$arrlog=explode("\n",$log);
#for($i=0;$i<count($arrlog)-1;$i++){
#echo $arrlog[$i];
#$lognew=$lognew."<div style='word-break:keep-all;border-bottom: 1px solid;'>".$arrlog[$i]."</div></br>";
#}
?>
<form action="analyse.php" method="post"  style="border:0;line-height:35px;" >
Username:<input type="text" name="user">
Feature:<input type="text" name="feature" >
Jingzhun:<input type="checkbox" name="jingzhun" value="jingzhun">
<input type="date" name="starttime" id="starttime" max="<?php echo date('Y-m-d') ?>">
<input type="date" name="endtime" id="endtime" max="<?php echo date('Y-m-d') ?>">
<input type="hidden" name="com" value="<?php echo $com ?>">
<input type="submit" value="submit">
</form>
<div style="border:1px solid;height:30px;line-height:30px;"><b>*Now We Show Log Last 100 Line;</b></div>
<div  class='comlist' style="height:20px;border-top:1px solid;border-bottom:0"> </div>
<!--
<div style='position:relative;'>
<?php //echo $lognew; ?>
</div>-->
<p style="white-space:pre-line"><?php echo $log; ?></p>
</body>
</html>
