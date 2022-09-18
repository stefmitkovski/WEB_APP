<?php

require_once 'database.php';

    $sql = "
    drop table if exists transaction;
    drop table if exists users;
    CREATE TABLE users (
    email varchar(100) PRIMARY KEY,
    first_name varchar(100) NOT NULL,
    last_name varchar(100) NOT NULL,
    phone_number varchar(50) NOT NULL,
    discount int default 5,
    password varchar(100) NOT NULL,
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
    stock int not null,
    created_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    // use exec() because no results are returned
    $db->exec($sql);
    echo "Table 'products' created successfully \r\n";

    $sql = "
    drop table if exists anonymous;
    CREATE TABLE anonymous (
    email varchar(100) PRIMARY KEY
    )";

    // use exec() because no results are returned
    $db->exec($sql);
    echo "Table 'anonymous' created successfully \r\n";

    $sql = "
    CREATE TABLE transaction (
    transaction_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    quantity int not null,
    user varchar(100) default null,
    anon_user varchar(100) default null,
    product int,
    transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user) REFERENCES users(email),
    FOREIGN KEY (anon_user) REFERENCES anonymous(email),
    FOREIGN KEY (product) REFERENCES products(product_id)
    )";

    // use exec() because no results are returned
    $db->exec($sql);
    echo "Table 'transaction' created successfully \r\n";

?>