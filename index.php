<?php
//  require_once('screens/home.php');

// Grabs the URI and breaks it apart in case we have querystring stuff
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

session_start();

require_once('./logic/connect.php');

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
	// Own profile page
	case '/profile':
        $user = fetch_record("SELECT CONCAT(e.first_name, ' ', e.last_name) as name, e.email as email, ep.description as description, ep.pitch_url as pitch_url FROM entrepreneurs as e JOIN entrepreneur_profiles as ep ON e.id = ep.id WHERE e.id=".$_SESSION['user_id']);
		require './screens/profile-entrepreneur.php';
		break;
	// Everything else
	default:
		header('HTTP/1.0 404 Not Found');
		require './screens/404.php';
		break;
}
