<html>
<head>
<link href="jscss/login.css" rel="stylesheet">
</head>
<title>Dango License Manager Login</title>
<body style="background: #eae7e752;">
<div class='login'>
<form action="login.php" method="post">
 <fieldset style="border-width:1px;border-radius:10px;background:#FFF;">
  <legend>Manager Login</legend>
  <ul>
  <li>
   <label style="display:inline-block;width:100px;line-height:45px;">UserName:</label>
   <input type="text" name="username">
  </li>
  <li>
   <label  style="display:inline-block;width:100px;line-height:45px;">Password:</label>
   <input type="password" name="password">
  </li>
  <li>
   <label  style="display:inline-block;width:100px;line-height:45px;"> </label>
   <input type="checkbox" name="remember" value="yes">Auto Login 7 Days
  </li>
  <li>
   <label  style="display:inline-block;width:100px;line-height:55px;min-height:35px;"> </label>
   <input type="submit" name="login" value="Login" style="background:#46bfec52;font-size:18px;border-radius:10px;">
  </li>
  </ul>
 </fieldset>
 </form>
</div>
</body>
</html>
<?php 
 header('Content-type:text/html; charset=utf-8');
 session_start();
 if (isset($_POST['login'])) {
 $username = trim($_POST['username']);
 $password = md5(trim($_POST['password']));
 $realpassword=trim(shell_exec("cat users/".$username));
 if (($username == '') || ($password == '')) {
  header('refresh:3; url=login.php');
  echo "<script>alert('You must input username and password!');</script>";
  exit;
 } elseif (($username != $username) || ($password != $realpassword)) {
  header('refresh:3; url=login.php');
  echo "<script>alert('Username or Password Error!');</script>";
  exit;
 } elseif (($username = $username) && ($password == trim($realpassword))) {
  $_SESSION['username'] = $username;
  $_SESSION['islogin'] = 1;
  if ($_POST['remember'] == "yes") {
  setcookie('username', $username, time()+7*24*60*60);
  setcookie('code', md5($username.md5($password)), time()+7*24*60*60);
  } else {
  setcookie('username', '', time()-999);
  setcookie('code', '', time()-999);
  }
  header('location:index.php');
 }
 }
 ?>
<script>
$("document").ready(function(){    
                //防止在frame里面出现登录页面    
                if(top.location!==self.location){     
                    //alert(top.location);     
                    //alert(self.location);     
                    top.location.href=self.location.href;     
                }     
    
                    
            }); 
</script>
