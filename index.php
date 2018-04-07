<?php
//  require_once('screens/home.php');

// Grabs the URI and breaks it apart in case we have querystring stuff
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

// Route it up!
switch ($request_uri[0]) {
	// Home page
	case '/':
		require './screens/home.php';
		break;
	// Login page
	case '/login':
		require './screens/login.php';
		break;
	// Register page
	case '/register':
		require './screens/register.php';
		break;
	// Register page
	case '/profile':
		require './screens/profile-entrepreneur.php';
		break;
	// Everything else
	default:
		header('HTTP/1.0 404 Not Found');
		require './screens/404.php';
		break;
}