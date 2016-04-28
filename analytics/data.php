<?php
include('functions.php');
session_start();
if (!isset($_SESSION['auth'])||$_SESSION['auth']!=1)
{
    header('Location: index.php');
    die("ERROR: Not logged in.");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>2Short - 0xFireball Edition - Analytics Reporting</title>
    </head>
    <body>
        <div id="clicks">
            <h1>URL Click Statistics</h1>
            <pre>
                <?php
                    print_r(getClickList());
                ?>
            </pre>
        </div>
    </body>
</html>