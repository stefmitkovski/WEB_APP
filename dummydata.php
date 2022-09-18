<?php

// За да може да се користи скриптава треба првин да се повика командата:
// composer update

require_once 'vendor/autoload.php';
require_once 'database.php';


$faker = Faker\Factory::create();


for ($i = 0; $i < 5; $i++) {

    // // Креирање на податоци за табелата 'users
    $statement = $db->prepare('INSERT INTO users (email,first_name,last_name,phone_number,password)
    VALUES (:email, :first_name, :last_name, :phone_number, :password)');
    $statement->bindValue(':email', $faker->email());
    $statement->bindValue(':first_name', $faker->firstName());
    $statement->bindValue(':last_name', $faker->lastName());
    $statement->bindValue(':phone_number', $faker->phoneNumber());
    $statement->bindValue(':password', password_hash('password',PASSWORD_DEFAULT));
    $statement->execute();

    // Креирање на податоци за табелата 'products'
    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,stock)
    VALUES (:title, :description, :image, :price_new, :price_old, :stock)');
    $statement->bindValue(':title', $faker->word(10));
    $statement->bindValue(':description', $faker->paragraph());
    $statement->bindValue(':image', '/public/images/wooden_stool.jpg');
    $statement->bindValue(':price_new', $faker->numberBetween(20, 50));
    $statement->bindValue(':price_old', $faker->numberBetween(60, 80));
    $statement->bindValue(':stock', $faker->numberBetween(0, 100));
    $statement->execute();

}


?>