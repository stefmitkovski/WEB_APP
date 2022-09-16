<?php

$db = new PDO('mysql:host=localhost;dbname=example;charset=utf8mb4', 'test', 'password');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>