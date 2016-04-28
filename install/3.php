<?php

$toWrite = '$logURL = "' . $_POST['logName'] . '";
$contact = "' . $_POST['email'] . '";
$analyticspw = "' . $_POST['analytics'] . '";
$andb = "analytics/db/"; //analytics database
$idLength = ' . $_POST['idLen'] . '; ?>';

$toWrite = $toWrite."\r\n<?php ".'$installdone'." = true;?>";

$worked = file_put_contents("../config.php", $toWrite, FILE_APPEND);

if ($worked==false){
	$status = "ERROR: Filewrite failed.";
} else {
	$status = "Success! 2short - 0xFireball Edition has been installed! <font color=\"#FF0000\"><a href=\"../\">Click here to return to the homepage and clean up a few things to complete the installation.</a></font>";
}

?>

<html>
<head>
	<title>2short Installer -- Page 2</title>
	<style type="text/css">
	body {
		padding: 50px;
		font-family: Verdana, Geneva, sans-serif;
		font-size: 14pt;
	}
	</style>
</head>
<body>
	
	<h2>2short Installer</h2>
    
    <strong><?php echo $status; ?></strong>

</body>
</html>