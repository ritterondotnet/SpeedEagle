<?php

$toWrite = '<?php $siteTitle = "' . $_POST['title'] . '";
$siteDescription = "' . $_POST['description'] . '";
$webURL = "' . $_POST['url'] . '";
$metaDescription = "' . $_POST['metaDescription'] . '";
$metaKeywords = "' . $_POST['metaKeywords'] . '";';

$worked = file_put_contents("../config.php", $toWrite);

if ($worked==false){
	$status = "<strong>ERROR:</strong> Filewrite failed. Please CHMOD proper permissions (755) to 'config.php'.";
} else {
	$status = "<font color=\"green\">Success! Part 1 complete.</font>";
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
    <script type="text/javascript">
	window.onload=function() {
		document.forms[0][0].focus();
	}
	</script>
</head>
<body>
	
    <?php echo $status; ?><br \><br \><br \>
	<h2>2short Installer -- Page 2</h2>
    
    <p>This form is just your website's infrastructure.</p>
    <form method="post" action="3.php">
    <label for="logName">Log filename: </label><input type="text" id="logName" name="logName" size="15" value="urls.txt"/><br \><br \>
    <label for="email">Your email: </label><input type="text" id="email" name="email" size="25" /> <font size="small">(displayed)</font><br \><br \>
    <label for="analytics">Your administration password: </label><input type="password" id="analytics" name="analytics" size="25" /> <font size="small">(for accessing analytics)</font><br \><br \>
    <label for="idLen">Length of randomly generated IDs: </label><input type="text" id="idLen" name="idLen" size="3" value="4" /><br \><font size="2">Used when visitor doesn't enter custom keyword.</font><br \><br \>
    <input type="submit" value="Finish" />
    </form>

</body>
</html>