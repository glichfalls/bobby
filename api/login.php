<?php

require_once '../bootstrap.php';

$username = $_POST['username'];
$password = $_POST['password'];

$_SESSION['username'] = $username;
redirect('/');

/* $password_repeat = $_POST['passsword-repeat']; */

//check if the inputs aren't empty
if(strlen($username) > 0 && strlen($password) > 0) {

    //read from database
    $query = "select * from users where username = '$username' limit 1";

    $result = mysqli_query($con, $query);

    if ($result) {

        if(mysqli_num_rows($result) > 0) {

            $user_data = mysqli_fetch_assoc($result);
            if($user_data['password'] === $password) {

                $_SESSION['username'] = $user_data['username'];

                redirect('/');

            }

        }

    }

    redirect('/login?error=Please enter the correct username and/or password!');

} else {

    redirect('/login?error=Please enter some valid information!');

}