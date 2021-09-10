<?php
include "common.php";
$com=$_POST["com"];
echo $com;
$option=shell_exec("sudo cat option/".$com.".option");
?>
<head> 
<form name="option" action="optionsub.php" method="post">
<textarea  name="option" style="width:70%;height:70%"><?php echo $option ?></textarea></br>

<input type="hidden" name="com" value="<?php echo $com?>">
<input type="submit" value="submit">
</form>
</body> 
