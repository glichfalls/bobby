<?php

require_once '../bootstrap.php';

global $db;

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];
    /* $password_repeat = $_POST['passsword-repeat']; */

    //check if the inputs aren't empty
    if($username !== '' && $password !== '') {

        //save to database
        $db->query('insert into users (username, password) values (:username, :password)', [
            'username' => $username,
            'password' => password_hash($password, PASSWORD_BCRYPT),
        ]);

        header("Location: /login");

    } else {

        header('Location: /signup?error=Please enter some valid information!');

    }

    exit();

}