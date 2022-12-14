<?php

require_once '../bootstrap.php';

global $db;

$username = $_POST['username'];
$password = $_POST['password'];

if($username !== '' && $password !== '') {
    $result = $db->fetch('select * from users where username = :username limit 1', [
        'username' => $username,
    ]);
    if (count($result) !== 1) {
        redirect('/login?error=Please enter the correct username and/or password!');
    } else {
        $result = $result[0];
        if(password_verify($password, $result['password'])) {
            $_SESSION['username'] = $result['username'];
            redirect('/');
        }
    }
}
redirect('/login?error=Please enter some valid information!');