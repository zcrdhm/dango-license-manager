<?php 
 header('Content-type:text/html; charset=utf-8');
 session_start();
 $username = $_SESSION['username'];
 $_SESSION = array();
 session_destroy();
 setcookie('username', '', time()-99);
 setcookie('code', '', time()-99);
 #echo "GoodBye, ".$username.'<br>';
 #echo "<a href='login.php' target='_parent'>ReLogin</a>";
  echo "<script>alert('Goodbye $username');top.location.href='login.php'</script>"
 ?>
