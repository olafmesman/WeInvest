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


$select_user = "SELECT id FROM %s WHERE email = '%s' AND password = '%s'";
// Login as investor.
if (sizeof(fetch_all(sprintf($select_user, "investors", $_POST['email'], $_POST['password'])))!=0) {
    $_SESSION['user_type'] = 'investor';
    $_SESSION['user_id'] = fetch_all(sprintf($select_user, "investors",
                                             $_POST['email'], $_POST['password']))[0]['id'];
    header("Location: /profile/i/".$_SESSION['user_id']);
}
// Login as entrepreneur.
else if (sizeof(fetch_all(sprintf($select_user, "entrepreneurs",
                                  $_POST['email'], $_POST['password'])))!=0) {
    $_SESSION['user_type'] = 'entrepreneur';
    $_SESSION['user_id'] = fetch_all(sprintf($select_user, "entrepreneurs",
                                             $_POST['email'], $_POST['password']))[0]['id'];
    header("Location: /profile/e/".$_SESSION['user_id']);
}
// Give error that login didn't work.
else {
    $_SESSION['login_errors'] = 'invalid login';
    header("Location: /login");
}
