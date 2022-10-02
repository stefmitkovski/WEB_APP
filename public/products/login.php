<?php

require_once '../../database.php';
require_once '../../models/UserModel.php';

$user = new UserModel($db);


if (isset($_SESSION['user'])) {
    session_unset();
    session_destroy();
}
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (strlen($email) > 255 || strlen($password) > 255 || strlen($password) < 6) {
        $errors[] = 'Wrong email or password';
    } else {
        $check = $user->checkCredentials($email);
    }
    if (empty($errors)) {
        if ($check->rowCount() == 1) {
            $data = $check->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $data['password'])) {
                $_SESSION['user'] = $data['name'];
                header("Location: index.php");
                exit;
            }
        }
        $errors[] = 'Wrong email or password';
    }
    setcookie("errors", json_encode($errors));
    header('Location: index.php');
    exit;
}
header('Location: index.php');
exit;
