<?php
//  require_once('screens/home.php');

// Grabs the URI and breaks it apart in case we have querystring stuff
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

session_start();

// Route it up!
switch ($request_uri[0]) {
	// Landing page
	case '/':
		require './screens/landing-page.php';
		break;
	// Landing page
	case '/home':
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
	// Profile page
	case '/profile':
		require './screens/profile-entrepreneur.php';
		break;
	// Feed page
	case '/feed':
		require './screens/feed.php';
		break;
	// Everything else
	default:
		header('HTTP/1.0 404 Not Found');
		require './screens/404.php';
		break;
}
