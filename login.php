<?php

session_start();

$conn = mysqli_connect('localhost', 'root', '', 'aoramaterial');
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
