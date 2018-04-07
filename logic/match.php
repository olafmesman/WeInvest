<?php

// Check if it is a illigal operation.
session_start();

// if (!(isset($_POST['entrepreneur_id']) && $_SESSION['user_type'] == 'investor') ||
//     !(isset($_POST['investor_id']) && $_SESSION['user_type'] == 'entrepreneur')) {
//     header("Location: /404");
//     die();
// }
require_once("connect.php");

session_start();

require_once("connect.php");

$select = "SELECT status FROM matches WHERE entrepreneurs_id = %d AND investors_id = %d";
$insert = "INSERT INTO matches (entrepreneurs_id, investors_id) VALUES (%d, %d)";
$update = "UPDATE matches SET status = %d WHERE entrepreneurs_id = %d AND investors_id = %d";
$delete = "DELETE FROM matches WHERE entrepreneurs_id = %d AND investors_id = %d";
echo sprintf($select, $_POST['entrepreneur_id'], $_SESSION['user_id']);
if ($_SESSION['user_type'] == 'entrepreneur') {
    // echo sprintf($select, $_POST['entrepreneur_id'], $_SESSION['user_id']);
    if (fetch_record(sprintf($select, $_SESSION['user_id'], $_POST['investor_id']))) {
        run_mysql_query(sprintf($update, $_SESSION['user_id'], $_POST['investor_id']));
    } else {
        run_mysql_query(sprintf($insert, $_SESSION['user_id'], $_POST['investor_id']));
    }
} else {
    // echo sprintf($select, $_POST['entrepreneur_id'], $_SESSION['user_id']);
    var_dump(fetch_record(sprintf($select, $_POST['entrepreneur_id'], $_SESSION['user_id'])));
    echo "<br >";
    if (fetch_record(sprintf($select, $_POST['entrepreneur_id'], $_SESSION['user_id']))) {
        if (fetch_record(sprintf($select, $_POST['entrepreneur_id'], $_SESSION['user_id']))['status'] == 0) {
            run_mysql_query(sprintf($update, 1, $_POST['entrepreneur_id'], $_SESSION['user_id']));
        } else {
            run_mysql_query(sprintf($delete, $_POST['entrepreneur_id'], $_SESSION['user_id']));
        }
        var_dump(fetch_record(sprintf($select, $_POST['entrepreneur_id'], $_SESSION['user_id'])));
    } else {
        run_mysql_query(sprintf($insert, $_POST['entrepreneur_id'], $_SESSION['user_id']));
    }
}
header("Location: ". $_POST['url']);
