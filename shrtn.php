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
	
	if(isset($_POST['url']) && !empty($_POST['url']))
	{
		$url = $_POST['url'];
		$url = trim($url, '!"#$%&\'()*+,-./@:;<=>[\\]^_`{|}~');
		
		if(filter_var($url, FILTER_VALIDATE_URL))
		{
			$res = $mysqli->query('SELECT id FROM ' . DB_TABLE. ' WHERE long_url="' . $mysqli->real_escape_string($url) . '"');
			$already_shortened = $res->fetch_array();
			
			if(!empty($already_shortened[0]))
			{
				// URL has already been shortened
				$shortened_url = getShortenedURLFromID($already_shortened[0]);
			}
			else
			{
				// URL not in database, insert
				$mysqli->query('LOCK TABLES ' . DB_TABLE . ' WRITE;');
				$mysqli->query('INSERT INTO ' . DB_TABLE . ' (long_url, created, creator) VALUES ("' . $mysqli->real_escape_string($url) . '", NOW(), "' . $mysqli->real_escape_string($_SERVER['REMOTE_ADDR']) . '")');
				$shortened_url = getShortenedURLFromID($mysqli->insert_id);
				$mysqli->query('UNLOCK TABLES');
			}
			//Return it to the user
			echo BASE_HREF . $shortened_url;
		}
		else
		{
			echo "Invalid URL: " . $url;
			exit();
		}
	}
	//This function converts the base 10 "ID" to the base X "ShortURL". The base is determined by the "ALLOWED_CHARS" array. 
	function getShortenedURLFromID ($integer, $base = ALLOWED_CHARS)
	{
		$length = strlen($base);
		while($integer > $length - 1)
		{
			$out = $base[fmod($integer, $length)] . $out;
			$integer = floor( $integer / $length );
		}
		return $base[$integer] . $out;
	}

?>