<?php

session_start();

include 'config.php';
$conn = mysqli_connect($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
$email = str_replace("'", "\'", $_POST['email']);
$password = sha1($_POST['password']);
$result = mysqli_query($conn, "SELECT * FROM `user` WHERE email='$email' AND password='$password'");
if ($row = mysqli_fetch_array($result)) {
    if ($row['id'] != '') {
        $_SESSION['user_id'] = $row['id'];
        echo 'success';
        exit;
    }
}

exit;
