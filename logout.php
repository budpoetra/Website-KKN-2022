<?php 
// Log Out for SESSION
session_start();
$_SESSION = [];
session_unset();
session_destroy();

// Log Out for COOKIE
setcookie('id', '', time()-3600);
setcookie('key', '', time()-3600);

header("Location: login.php");
exit;
