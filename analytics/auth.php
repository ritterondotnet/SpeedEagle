<?php
include('../config.php');
session_start();

$cpw = $_POST['password']; //submitted password
if ($cpw == $analyticspw)
{
    $_SESSION['auth']=1;
}
header('Location: data.php');
?>