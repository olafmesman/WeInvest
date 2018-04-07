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

// Login as investor.
$select_user = "SELECT email FROM investors WHERE email = ".$_POST['email'];
$user = fetch_record($select_user);
if (sizeof($user)!=0) {
    $_SESSION['user_type'] = 'investor';
    $_SESSION['user_id'] = 1;
    header("Location: /feed");
}
// Login as entrepreneur.
$select_user = "SELECT email FROM entrepreneurs WHERE email = ".$_POST['email'];
$user = fetch_record($select_user);
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
