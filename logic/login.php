<?php

// Check if it is a illigal operation.
if (!isset($_POST['email']) || !isset($_POST['password'])) {
    header("Location: /404");
}
session_start();

require_once("connect.php");

// Reset session if already logged in.
if (isset($_SESSION['user_id'])) {
    session_destroy();
    session_start();
}

$select_user = "SELECT email FROM %s WHERE email = '%s'";

// Login as investor.
$user = fetch_all(sprintf($select_user, "investors", $_POST['email']));
if (sizeof($user)!=0) {
    $_SESSION['login_errors'] = var_dump($user);
    $_SESSION['user_type'] = 'investor';
    $_SESSION['user_id'] = 1;
    header("Location: /feed");
}

// Login as entrepreneur.
$user = fetch_all(sprintf($select_user, "entrepreneurs", $_POST['email']));
if (sizeof($user)!=0) {
    $_SESSION['user_type'] = 'entrepreneur';
    $_SESSION['user_id'] = 1;
    header("Location: /profile");
}
// Give error that login didn't work.
else {
    $_SESSION['login_errors'] = 'invalid login';
    header("Location: /login");
}
