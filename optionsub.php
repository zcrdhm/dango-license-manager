<?php
include "common.php";
$option=$_POST["option"];
$com=$_POST["com"];
shell_exec("sudo echo '".$option."' > ".$_SERVER['DOCUMENT_ROOT']."/option/".$com.".option");
echo "good";
#$print="sudo echo '".$option."' > ".$_SERVER['DOCUMENT_ROOT']."/option/".$com.".option";
#xecho $print;
?>
