<html>
<head>
<link href="jscss/style.css" rel="stylesheet">
</head>
<body class="header">
<div ><a href="/index.php" target="blank"><img src="jscss/logo.jpg" class="logo"></a>
<?php
include "common.php";
echo "<h1 style='color:#FFF;display:inline-block'>Dango License Manager</h1>";
?>
<div style="float:right;color:#FFF">HostID:<?php echo strtoupper($hostid)."&nbsp;&nbsp;&nbsp;" ; echo $_SESSION['username']."&nbsp;&nbsp;&nbsp;"; ?>  <a href="logout.php"  target="_parent">logout</a>&nbsp;&nbsp;&nbsp;</div>
</div>
</body>
</html>
