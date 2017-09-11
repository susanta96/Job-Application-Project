<?php
session_start();
// remove all session variables
if(!isset($_SESSION['id']))
{
  header('location:../login.php?msg=please_login');
}
unset($_SESSION[id]);
//session_unset();
unset($_SESSION[type]);
unset($_SESSION[jsname]);
unset($_SESSION[jsid]);
unset($_SESSION[name]);
// destroy the session
session_destroy();

header('location:index.php?msg=success_logout');

?>
