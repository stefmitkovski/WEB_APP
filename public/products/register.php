<?php

require_once '../../database.php';
require_once '../../models/UserModel.php';

$user = new UserModel($db);

if(isset($_SESSION['user'])){
    session_unset();
    session_destroy();
}

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email =  $_POST['email'];
    $emailcheck = preg_match('/^[A-Za-z0-9\.]{0,}@[A-Za-z]{0,}\.com/', $email, $emailcheck);
    $name = $_POST["name"];
    $password = $_POST['password'];
    $pconfirm = $_POST['repeatpassword'];

    if ($password != $pconfirm) {
        $errors[] = 'The entered password do not match';
    }

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if ($emailcheck == 0) {
        $errors[] = 'A vailid email address is required';
    } else if (strlen($email) > 255) {
        $errors[] = 'The name you enter is to long';
    }

    if (strlen($password) > 255 || strlen($password) < 6) {
        $errors[] = "The entered password isn't the right size";
    }
    
    if (strlen($name) > 100) {
        $errors[] = "The name number isn't the right size";
    }

    if ($user->checkExistence($email) > 0) {
        $errors = 'This email is taken please enter a new one';
    }

    if (empty($errors)) {
        if ($user->createUser($email,$name,$password)) {
            $_SESSION['user'] = $name;
            $_SESSION['email']= $email;
            header('Location: index.php');
            exit;
        }
    }
        setcookie("errors", json_encode($errors));
        header('Location: index.php');
}
?>