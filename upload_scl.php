<?php
include "common.php";
if (($_FILES["file"]["type"] == "application/x-gzip") && strpos($_FILES["file"]["name"],".tar.gz")){
if ($_FILES["file"]["error"] > 0)
{
 echo "Error" . $_FILES["file"]["error"] . "<br>";
}
else{
 $tarfilename=$_FILES["file"]["name"];
 $filename=str_replace(strrchr($tarfilename, "."),"",$tarfilename); 
 $filename=str_replace(strrchr($filename, "."),"",$filename); 
 $have=shell_exec("tar -tvf ". $_FILES["file"]["tmp_name"]."|grep lmgrd");
   if(empty($have)){
      echo "<script>alert('You Must Upload Right File');top.location.href='index.php'</script>";
   }else{
     move_uploaded_file($_FILES["file"]["tmp_name"],"tmp/".$tarfilename);
     shell_exec("tar zxvf tmp/".$tarfilename." -C scl/");
     shell_exec("sudo chown -R www:www scl/".$filename);
     shell_exec("sudo chmod -R 777 scl/".$filename);
     shell_exec("sudo rm -rf  tmp/".$tarfilename);
     $filepath=shell_exec("ls scl/".$filename."/lmgrd|grep No");
     #echo "ls scl/".$filename."/lmgrd|grep No";
     #echo $filepath;
   } 
}
if(empty($filepath)){
  echo "<script>alert('Flexlm $filename Upload Success');top.location.href='index.php'</script>";
 }else{
  echo "<script>alert('Flexlm $filename Upload bad ,I Donot Know Why!');top.location.href='index.php'</script>";
 }
}else{
  echo "<script>alert('File type Must tar.gz,Like scl_v2020.06.tar.gz');top.location.href='index.php'</script>";
}


function getrandom($len, $chars=null)
{
    if (is_null($chars)) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    }
    mt_srand(10000000*(double)microtime());
    for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < $len; $i++) {
        $str .= $chars[mt_rand(0, $lc)];
    }
    return $str;
}

?>
