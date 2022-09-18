<?php

    $db = new PDO('mysql:host=localhost;dbname=web_app;charset=utf8mb4', 'test', 'password'); 
    // Ова промени така што dbname е име на датабазата, 'test' e корисничко име на серверот и 'password' е лозинката
    // Одкако ќе го направиш тоа повикај ја оваа страната во некој пребарувач

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>