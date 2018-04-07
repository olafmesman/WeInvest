<?php

// Check if it is a illigal operation.
if (!(isset($_POST['entrepreneur_id']) && $_SESSION['user_type'] == 'investor') ||
    !(isset($_POST['investor_id']) && $_SESSION['user_type'] == 'entrepreneur')) {
    header("Location: /404");
}
session_start();
require_once("connect.php");
$select = "SELECT * FROM matches WHERE investors_id = %d AND entrepreneurs_id = %d";
$insert = "INSERT INTO matches (entrepreneurs_id, investors_id) VALUES (%d, %d)";
$update = "UPDATE matches SET type = 1 WHERE entrepreneurs_id = %d AND investors_id = %d";
if ($_SESSION['user_type'] == 'entrepreneur') {
    if (fetch_record(sprintf($select, $_SESSION['user_id'], $_POST['investor_id']))) {
        run_mysql_query(sprintf($update, $_SESSION['user_id'], $_POST['investor_id']));
    } else {
        run_mysql_query(sprintf($insert, $_SESSION['user_id'], $_POST['investor_id']));
    }
} else {
    if (fetch_record(sprintf($select, $_POST['entrepreneur_id'], $_SESSION['user_id']))) {
        run_mysql_query(sprintf($update, $_POST['entrepreneur_id'], $_SESSION['user_id']));
    } else {
        run_mysql_query(sprintf($insert, $_POST['entrepreneur_id'], $_SESSION['user_id']));
    }
}

echo "<script>history.go(-1);</script>";
