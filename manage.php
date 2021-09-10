<html>
<head>
<link href="jscss/style.css" rel="stylesheet">
</head>
<body>
<?php
include "setting.php";
$com=shell_exec("ls company -m");
$comnum=shell_exec("ls company|wc -l");
$comlist=explode(",",$com);
?>
<form name="del" method="post">
<?php
for($i=0;$i<$comnum;$i++){
echo "<div class='comlist' style='color:#000;'>".$comlist[$i]." | Daemon:".${trim($comlist[$i])}." | Port:".${trim($comlist[$i])."port"}."<input type=button value='del' class='button' onclick='delcom(\"".trim($comlist[$i])."\");' > </div></br>";
$postcom=trim($comlist[$i])."-".${trim($comlist[$i])}."-".${trim($comlist[$i])."port"}.",".$postcom;
#echo $postcom;
}
?>
<script type="text/javascript">
function delcom(com){
    var res=confirm('Sure to Delete this Company');
    if(res){
            document.del.action="comdel.php?com=" + com;
            document.del.submit();
        }
}
</script>
</form>
</br>
<div class='comlist'>
<form action="addcom.php" method="post" enctype="multipart/form-data" style="background:#eae7e752">
ComName:
<input type="text" name="newcom">
Daemon:
<input type="file" name="file" id="file">
PortNum:
<input type="text" name="newport">
<input type="hidden" name="old" value=<?php echo $postcom; ?>>
<input type="submit" name="submit">
</form>
</div></br>
</body>
</html>
