<?php
include "common.php";
$com=$_POST["com"];
$allowedExts = array("txt", "lic", "dat");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (($_FILES["file"]["type"] == "text/plain") || ($_FILES["file"]["type"] == "application/octet-stream") && ($_FILES["file"]["size"] < 40960000) && in_array($extension, $allowedExts)){

if ($_FILES["file"]["error"] > 0)
{
 echo "Error" . $_FILES["file"]["error"] . "<br>";
}
else
{
 echo "File Name: " . $_FILES["file"]["name"] . "<br>";
 echo "File Type: " . $_FILES["file"]["type"] . "<br>";
 echo "File Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
 echo "File Where: " . $_FILES["file"]["tmp_name"]."</br>";
 $filename=buildname($com);
 move_uploaded_file($_FILES["file"]["tmp_name"],"company/".$com."/".$filename.".".$extension);
 echo "Stored in: " . "company/".$com."/".$filename.".".$extension;
 echo "<script>alert('Upload Good,The filename is $filename.$extension');window.history.go(-1);</script>";
}
}else{
 echo "The file you upload is not allow type";
}

function buildname($com){
$time=date("Y-m-d-H-i-s");
$random=getRandom(8);
$buildname=$time."-".$random;
return $com."-".$buildname;

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
