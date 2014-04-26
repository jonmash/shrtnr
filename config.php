<?php
	/*
	 * Authored by Jonathan Mash http://jonmash.ca/
	 * License: http://creativecommons.org/licenses/by-sa/4.0/
	 * Original inspiration came from Brian Cray (http://briancray.com/)
	 */

	// db options
	define('DB_NAME', 'dbname');
	define('DB_USER', 'dbuser');
	define('DB_PASSWORD', 'dbpass');
	define('DB_HOST', 'localhost');
	define('DB_TABLE', 'shortenedurls');

	
	// base location of script (include trailing slash)
	define('BASE_HREF', 'http://' . $_SERVER['HTTP_HOST'] . substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1));


	// change to TRUE to start tracking referrals
	define('TRACK', TRUE);
	
	
	// change the shortened URL allowed characters
	define('ALLOWED_CHARS', '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
?>