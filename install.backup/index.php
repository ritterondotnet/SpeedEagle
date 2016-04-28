<?php
$url = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
if (strpos($url,"index.php")) {
	$url = substr($url, 0, strlen($url) - 17);
} else {
	$url = substr($url, 0, strlen($url) - 8);
}
?>

<html>
<head>
	<title>2short Installer -- Page 1</title>
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

	<h2>2short - 0xFireball Edition Installer -- Page 1</h2>
    
    <p>Thanks for using 2short - 0xFireball Edition! Just go through this quick installation process, and your URL shortener will be ready in a matter of minutes!</p>
    <br \><br \>
    <p>This form is just your website's basics - title, description, etc.</p>
    <form method="post" action="2.php">
        <label for="title">Title: </label><input type="text" id="title" name="title" size="25" /><br \><br \>
        <label for="url">URL: </label><input type="text" id="title" name="url" size="35" value="<?php echo $url; ?>"/> <u>Include the install directory and trailing slash.</u><br \><br \>
        <label for="description">Description:</label><br \>
        <textarea id="description" rows="10" cols="70" name="siteDescription">Use HTML tags!</textarea><br \><br \>
        <label for="metaDescription">Meta Description: </label><input type="text" id="metaDescription" name="metaDescription" size="50"/><br \>
        <label for="metaKeywords">Meta Keywords: </label><input type="text" id="metaKeywords" name="metaKeywords" size="52" value="url, shorten, trim, small"/><br \><br \>
        <input type="submit" value="Next" />
    </form>

</body>
</html>