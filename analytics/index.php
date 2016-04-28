<?php
session_start();
if (isset($_SESSION['auth']))
{
    
}
?>
<form action="auth.php" method="POST">
    Enter your password: <input type="password" name="password" />
    <input type="submit"/>
</form>