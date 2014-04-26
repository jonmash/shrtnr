<?php
/*
 * Authored by Jonathan Mash http://jonmash.ca/
 * License: http://creativecommons.org/licenses/by-sa/4.0/
 * Original inspiration came from Brian Cray (http://briancray.com/)
 */

require('config.php');
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysqli->connect_errno) {
	echo "Database Error";
	exit();
}

if(!preg_match('|^[0-9a-zA-Z]{1,6}$|', $_GET['url']))
{
    die('That is not a valid short url');
}

//Get the DB ID from the ShortID
$shortened_id = getIDFromShortenedURL($_GET['url']);

$res = $mysqli->query('SELECT long_url FROM ' . DB_TABLE . ' WHERE id="' . $mysqli->real_escape_string($shortened_id) . '"');
$long_url = $res->fetch_array();
$long_url = $long_url[0];

if(empty($long_url) || !isset($long_url) || $long_url == "")
{
	//Unknown shortID, redirect to home page.
	header('Location: ' . BASE_HREF);
	exit;
}

//If tracking is enabled, increment the referral field. 
if(TRACK)
{
    $mysqli->query('UPDATE ' . DB_TABLE . ' SET referrals=referrals+1 WHERE id="' . $mysqli->real_escape_string($shortened_id) . '"');
}

//Notify the browser of the new location
header('HTTP/1.1 301 Moved Permanently');
header('Location: ' .  $long_url);
exit;

//This function takes the base X shortID and converters it to a base 10 database ID.
//The base X is defined by the number of characters in ALLOWED_CHARS. 
function getIDFromShortenedURL ($string, $base = ALLOWED_CHARS)
{
    $length = strlen($base);
    $size = strlen($string) - 1;
    $string = str_split($string);
    $out = strpos($base, array_pop($string));
    foreach($string as $i => $char)
    {
        $out += strpos($base, $char) * pow($length, $size - $i);
    }
    return $out;
}

?>