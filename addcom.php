<?php
$newcom=$_POST["newcom"];
$temp = explode(".", $_FILES["file"]["name"]);
$newport=$_POST["newport"];
if ($_FILES["file"]["type"] == "application/octet-stream"){
if ($_FILES["file"]["error"] > 0)
{
 echo "Error" . $_FILES["file"]["error"] . "<br>";
}
else
{
if(!empty($newcom) && !empty($newport) && !empty($_FILES["file"]["name"])){

 shell_exec("mkdir -p daemon/".$newcom);
 shell_exec("mkdir -p company/".$newcom);
 move_uploaded_file($_FILES["file"]["tmp_name"],"daemon/".$newcom."/".$_FILES["file"]["name"]);
 shell_exec("sudo chmod 777 daemon/".$newcom."/".$_FILES["file"]["name"]);
 $old=$_POST["old"];
 $new=$old.$newcom."-".$_FILES["file"]["name"]."-".$newport;
 $newarr=explode(",",$new);
 $newnum=count($newarr);
 shell_exec("echo '<?php' > setting.php ");
 for($i=0;$i<$newnum;$i++){
  $comarr=explode("-",$newarr[$i]);
  shell_exec("echo '\$".$comarr[0]."=\"".$comarr[1]."\";'>> setting.php");
  shell_exec("echo '\$".$comarr[0]."port=\"".$comarr[2]."\";'>> setting.php");
 # echo "<script>alert('Success Build $newcom');top.location.href='index.php'</script>";
 }
  echo "<script>alert('Success Build $newcom');top.location.href='index.php'</script>";
}

else{
   echo "<script>alert('Company Name and Port cannot empty');window.history.go(-1);</script>";
 }
}
}
?>
