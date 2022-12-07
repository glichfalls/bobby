<?php

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];
    /* $password_repeat = $_POST['passsword-repeat']; */

    //check if the inputs aren't empty
    if(!empty($username) && !empty($password)) {

        //save to database
        $query = "insert into users (username, password) values ('$username', '$password')";

        mysqli_query($con, $query);

        header("Location: /login");

    } else {

        header('Location: /signup?error=Please enter some valid information!');

    }

    exit();

}