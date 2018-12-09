<?php
include_once '../database/connect.php';
include_once 'general.php';
// Note that currently only teachers are users of the plagiarinator
// , so this only checks to see if a teacher exists
function user_exists($username) {
    global $mysqli;
    $username = sanitize($username);
    $result = $mysqli->query("SELECT count('ID_Teacher') as 'numUsers' FROM tblUsers WHERE Username = '$username'");
    $row = $result->fetch_object();
    return ($row->numUsers) ? true : false;
}

function password_match($username, $password) {
    global $mysqli;
    $result = $mysqli->query("SELECT Password_Hash FROM tblUsers WHERE Username = '$username'");
    if($result != NULL) {
        $object = $result->fetch_object();
        return password_verify($password, $object->Password_Hash);
    }
    else
        return NULL;
}

function email_exists($email) {
    global $mysqli;
    $email = sanitize($email);
    $result = $mysqli->query("SELECT count('ID_Teacher') as 'numTeacherId' FROM tblUsers WHERE Email = '$email'");
    $row = $result->fetch_object();
    return ($row->numTeacherId) ? true : false;
}

# this function is used to authenticate users.
# Pass the username and password. Returns true if the user authentication passes and false if it fails.
function auth($username, $pwd) {
    global $mysqli;
    return user_exists($username) && password_match($username, $pwd);
}

function find_id($username, $pwd) {
    require 'core/database/connect.php';
    if (auth($username, $pwd))
    {
        $query = "SELECT ID_Teacher FROM tblUsers WHERE Username = '$username'";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        return $row[0];
    }
}
?>