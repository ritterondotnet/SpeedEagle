<?php

require('config.php');

//Record analytics in database
function recordAnalytics($url,$id,$db)
{
    if (!file_exists($db)) {
        mkdir($db, 0775, true);
    }
    $fn = $db.$id;
    if (!file_exists($fn))
    {
        file_put_contents($fn,strval(0));
    }
    //turn file into array
    $lines = file($fn, FILE_IGNORE_NEW_LINES);
    //save number of hits
    $hits = $lines[0] = intval($lines[0])+1;
    //save URL
    $lines[1]=$url;
    //save contents from array
    file_put_contents($fn, implode(PHP_EOL, $lines));
}

//Function to get URL of current page.
function getURL() {
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {
		$pageURL .= "s";
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}


//Function to display shortened URL.
function showShortenedURL($shortKey,$domainURL){
	$showInfo = "Success! Visit your URL at  <input type=\"text\" id=\"shortURL\" size=\"" . (strlen($domainURL.$shortKey)+1) . "\" value=\"" . $domainURL . "?" . $shortKey . "\" readonly />.<br \><br \>HTML:<br \><pre>" . htmlspecialchars("<a href=\"" . $domainURL . "?" . $shortKey . "\">" . $domainURL . "?" . $shortKey . "</a>") . "</pre><br \><br \>BB Code:<br \><pre>" . htmlspecialchars("[url=" . $domainURL . "?" . $shortKey . "]" . $domainURL . "?" . $shortKey . "[/url]") . "</pre><br \><br \>Wiki:<br \><pre>" . htmlspecialchars("[" . $domainURL . "?" . $shortKey . "]") . "</pre>";
	return $showInfo;
}


//Function to write log file.
function writeLog($fileURL,$txt){
	$fh = fopen($fileURL, "a");
	fwrite($fh, $txt);
	fclose($fh);
}

/**
 * Recursively delete a directory
 *
 * @param string $dir Directory name
 * @param boolean $deleteRootToo Delete specified top-level directory as well
 */
function unlinkRecursive($dir, $deleteRootToo)
{
    if(!$dh = @opendir($dir))
    {
        return;
    }
    while (false !== ($obj = readdir($dh)))
    {
        if($obj == '.' || $obj == '..')
        {
            continue;
        }

        if (!@unlink($dir . '/' . $obj))
        {
            unlinkRecursive($dir.'/'.$obj, true);
        }
    }

    closedir($dh);

    if ($deleteRootToo)
    {
        @rmdir($dir);
    }

    return;
}

?>