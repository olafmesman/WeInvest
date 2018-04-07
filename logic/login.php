<?php

// Check if it is a illigal operation.
if (!isset($_POST['email']) || !isset($_POST['password'])) {
    header("Location: /404");
}
session_start();

// Reset session if already logged in.
if (isset($_SESSION['user_id'])) {
    session_destroy();
    session_start();
}

// Login as entrepreneur.
if ($_POST['email'] == 'investor@gmail.com') {
    $_SESSION['user_type'] = 'entrepreneur';
    $_SESSION['user_id'] = 1;
    header("Location: /profile");
}
// Login as investor.
else if ($_POST['email'] == 'eunice@gmail.com') {
    $_SESSION['user_type'] = 'investor';
    $_SESSION['user_id'] = 1;
    header("Location: /feed");
}
// Give error that login didn't work.
else {
    $_SESSION['login_errors'] = 'invalid login';
    header("Location: /login");
}
