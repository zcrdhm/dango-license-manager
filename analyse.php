<?php
$com=$_POST["com"];
$start=$_POST["starttime"];
$end=$_POST["endtime"];
$user=$_POST["user"];
$jingzhun=$_POST["jingzhun"];
if(!empty($jingzhun)){
  $jzss=" -w";
}else{
  $jzss=" -i";
}
$arruser=explode("|",$user);
for($m=0;$m<count($arruser);$m++){
$newuser="\\\" ".$arruser[$m]."@|";
$users=$users.$newuser;
}
$users=$users."buzhidaoshishei";
#echo $users;
$feature=$_POST["feature"];
if(!empty($jingzhun)){
$feature="\"".$feature."\"";
}
#echo $feature;
if(!empty($feature)){
$grepfeature="|grep ".$jzss." ".$feature;
}
$arrin=explode(" ",$arrin);
$starta=str_replace("-","",$start);
$enda=str_replace("-","",$end);
if($enda >= $starta && !empty($user)){
$startuse=str_replace("-","/",$start);
$arrstart=explode("/",$startuse);
$suse=preg_replace('/^0*/', '', $arrstart[1])."/".preg_replace('/^0*/', '', $arrstart[2])."/".$arrstart[0];
$enduse=str_replace("-","/",$end);
$arrend=explode("/",$enduse);
$euse=preg_replace('/^0*/', '', $arrend[1])."/".preg_replace('/^0*/', '', $arrend[2])."/".$arrend[0];

$startline=shell_exec("sudo grep -n ".$suse." log/".$com.".log|grep TIMESTAMP|head -1|awk -F \":\" '{print $1}'");
if(empty($startline)){
$startline="1";
}
$endline=shell_exec("sudo grep -n ".$euse." log/".$com.".log|grep TIMESTAMP|head -1|awk -F \":\" '{print $1}'");
if(empty($endline)){
$endline=shell_exec("cat log/".$com.".log|wc -l");

}
$outtime=shell_exec("sudo sed -n '".trim($startline).",".trim($endline)."p' log/".$com.".log|grep -E \"".$users."\"".$grepfeature."|grep \"OUT:\"|awk -F \" \" '{print $1}'");
#echo "sudo sed -n '".trim($startline).",".trim($endline)."p' log/".$com.".log|grep -E \"".$users."\"".$grepfeature."|grep \"OUT:\"|awk -F \" \" '{print $1}'";
$arrout=explode("\n",$outtime);
for($i=0;$i<count($arrout)-1 ;$i++){
$outnew=explode(":",$arrout[$i]);
$outall=$outnew[0]*3600+$outnew[1]*60+$outnew[2];
$newoutall=$newoutall+$outall;
}
$intime=shell_exec("sed -n '".trim($startline).",".trim($endline)."p' log/".$com.".log|grep -E \"".$users."@\"".$grepfeature."|grep \"IN:\"|awk -F \" \" '{print $1}'");

$arrin=explode("\n",$intime);
for($j=0;$j<count($arrout)-1 ;$j++){
$innew=explode(":",$arrin[$j]);
$inall=$innew[0]*3600+$innew[1]*60+$innew[2];
$newinall=$newinall+$inall;
}
$allusetime=$newinall-$newoutall;
#echo $allusetime;
echo "<script>alert('$user All use $allusetime/s');window.history.go(-1);</script>";
}else{
echo "<script>alert('Please check you input message!');window.history.go(-1);</script>";
}
?>
