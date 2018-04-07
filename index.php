

<?php
//  require_once('screens/home.php');

// Grabs the URI and breaks it apart in case we have querystring stuff
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

session_start();

require_once('./logic/connect.php');

if (substr($request_uri[0], 0, strlen("/profile/")) === "/profile/") {
    if (substr($request_uri[0], 0, strlen("/profile/i/")) === "/profile/i/") {
        $user = fetch_record("SELECT CONCAT(first_name, ' ', last_name) as name, email as email FROM investors WHERE id=".substr($request_uri[0], strlen("/profile/i/"), 1));
        if ($user) {
            require './screens/profile-investor.php';
        }
        else {
            header('HTTP/1.0 404 Not Found');
            require './screens/404.php';
        }
    } else if (substr($request_uri[0], 0, strlen("/profile/e/")) === "/profile/e/") {
        $user = fetch_record("SELECT ep.logo_url as icon_url, ep.profile_picture_url as profile_url, CONCAT(e.first_name, ' ', e.last_name) as name, e.email as email, ep.description as description, ep.pitch_url as pitch_url FROM entrepreneurs as e JOIN entrepreneur_profiles as ep ON e.id = ep.id WHERE e.id=".substr($request_uri[0], strlen("/profile/e/"), 2));
        if ($user) {
            require './screens/profile-entrepreneur.php';
        }
        else {
            header('HTTP/1.0 404 Not Found');
            require './screens/404.php';
        }
    }
} else {
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
        // Feed page
        case '/feed':
        require './screens/feed.php';
        break;
        case '/profile':
        header('Location: /profile/'.substr($_SESSION['user_type'],0,1).'/'.$_SESSION['user_id']);
        break;
        // Everything else
        default:
        header('HTTP/1.0 404 Not Found');
        require './screens/404.php';
        break;
    }
}
