<?php
$sclv=$_GET["version"];
$filepath="scl/".$sclv;
$scluse=shell_exec("ps -ef|grep lmgrd|grep scl|awk -F \"/\" '{print $6}' |grep ".$sclv."|grep -v grep");
if(empty($scluse)){
if(file_exists($filepath)){
  shell_exec("rm -rf scl/".$sclv);
  if(!file_exists($filepath)){
     echo "<script>alert('Delete Version $sclv Success');top.location.href='index.php'</script>";
  }else{
     echo "<script>alert('Error , Delete Version $sclv Fail');top.location.href='index.php'</script>";
  }
}else{
     echo "<script>alert('Error , I Donot Know Why !');top.location.href='index.php'</script>";
}
}else{
  echo "<script>alert('Error ,This Version Has Been Used!');top.location.href='index.php'</script>";

}
