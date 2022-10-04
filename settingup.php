<?php

require_once 'database.php';

    $sql = "
    drop table if exists transaction;
    drop table if exists users;
    CREATE TABLE users (
    email varchar(255) PRIMARY KEY,
    name varchar(100) NOT NULL,
    discount int default 5,
    password varchar(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    $db->exec($sql);
    echo "Table 'users' created successfully \r\n";

    $sql = "
    drop table if exists products;
    CREATE TABLE products (
    product_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title varchar(100) NOT NULL,
    description varchar(500),
    image varchar(300) not null,
    price_new int unsigned,
    price_old int unsigned not null,
    category varchar(100) not null,
    brand varchar(100) not null,
    stock int not null,
    created_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    // use exec() because no results are returned
    $db->exec($sql);
    echo "Table 'products' created successfully \r\n";

    $sql = "
    drop table if exists anonymous;
    drop table if exists reset_password;
    CREATE TABLE reset_password (
    email varchar(255) NOT NULL,
    token varchar(255) NOT NULL,
    FOREIGN KEY (email) REFERENCES users(email)
    )";

    // use exec() because no results are returned
    $db->exec($sql);
    echo "Table 'reset_password' created successfully \r\n";

    $sql = "
    CREATE TABLE transaction (
    transaction_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    quantity int not null,
    user varchar(100) default null,
    anon_user varchar(100) default null,
    product int,
    price int,
    transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user) REFERENCES users(email),
    FOREIGN KEY (product) REFERENCES products(product_id)
    )";

    // use exec() because no results are returned
    $db->exec($sql);
    echo "Table 'transaction' created successfully \r\n";

?>