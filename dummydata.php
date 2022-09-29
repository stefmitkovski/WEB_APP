<?php

// За да може да се користи скриптава треба првин да се повика командата:
// composer update

require_once 'vendor/autoload.php';
require_once 'database.php';


$faker = Faker\Factory::create();


for ($i = 0; $i < 5; $i++) {

    // // Креирање на податоци за табелата 'users
    $statement = $db->prepare('INSERT INTO users (email,name,password)
    VALUES (:email, :name, :password)');
    $statement->bindValue(':email', $faker->email());
    $statement->bindValue(':name', $faker->name());
    $statement->bindValue(':password', password_hash('password',PASSWORD_DEFAULT));
    $statement->execute();



    // Креирање на податоци за табелата 'products'
    // $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,stock)
    // VALUES (:title, :description, :image, :price_new, :price_old, :stock)');
    // $statement->bindValue(':title', $faker->word(10));
    // $statement->bindValue(':description', $faker->paragraph());
    // $statement->bindValue(':image', '/banner images/banner1.jpg');
    // $statement->bindValue(':price_new', $faker->numberBetween(null, 50));
    // $statement->bindValue(':price_old', $faker->numberBetween(60, 80));
    // $statement->bindValue(':stock', $faker->numberBetween(0, 100));
    // $statement->execute();

}

    //iphone 11
    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :stock)');
    $statement->bindValue(':title',"Iphone 11" );
    $statement->bindValue(':description', $faker->paragraph());
    $statement->bindValue(':image', '\public\images\iphone\iphone11.jpg');
    $statement->bindValue(':price_new', 650);
    $statement->bindValue(':price_old', 800);
    $statement->bindValue(':category', "Smartphones");
    $statement->bindValue(':stock', $faker->numberBetween(0, 100));
    $statement->execute();

    //iphone 13 mini
    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :stock)');
    $statement->bindValue(':title',"Iphone 13 Mini" );
    $statement->bindValue(':description', $faker->paragraph());
    $statement->bindValue(':image', '\public\images\iphone\iphone_13_mini.jpg');
    $statement->bindValue(':price_new', 800);
    $statement->bindValue(':price_old', 1000);
    $statement->bindValue(':category', "Smartphones");
    $statement->bindValue(':stock', $faker->numberBetween(0, 100));
    $statement->execute();

    //iphone SE
    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :stock)');
    $statement->bindValue(':title',"Iphone SE 3" );
    $statement->bindValue(':description', $faker->paragraph());
    $statement->bindValue(':image', '\public\images\iphone\iphone_se3.jpg');
    $statement->bindValue(':price_new', 800);
    $statement->bindValue(':price_old', 1000);
    $statement->bindValue(':category', "Smartphones");
    $statement->bindValue(':stock', $faker->numberBetween(0, 100));
    $statement->execute();

    //iphone 14 +
    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :stock)');
    $statement->bindValue(':title',"Iphone 14 Plus" );
    $statement->bindValue(':description', $faker->paragraph());
    $statement->bindValue(':image', '\public\images\iphone\iphone14plus.jpg');
    $statement->bindValue(':price_new', null);
    $statement->bindValue(':price_old', 1200);
    $statement->bindValue(':category', "Smartphones");
    $statement->bindValue(':stock', $faker->numberBetween(0, 100));
    $statement->execute();

    //iphone 14 PRO
    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :stock)');
    $statement->bindValue(':title',"Iphone 14 PRO" );
    $statement->bindValue(':description', $faker->paragraph());
    $statement->bindValue(':image', '\public\images\iphone\iphone14pro.jpg');
    $statement->bindValue(':price_new', null);
    $statement->bindValue(':price_old', 1200);
    $statement->bindValue(':category', "Smartphones");
    $statement->bindValue(':stock', $faker->numberBetween(0, 100));
    $statement->execute();

        //iphone 14 pro max
    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :stock)');
    $statement->bindValue(':title',"Iphone 14 PRO MAX" );
    $statement->bindValue(':description', $faker->paragraph());
    $statement->bindValue(':image', '\public\images\iphone\iphone14promax.jpg');
    $statement->bindValue(':price_new', null);
    $statement->bindValue(':price_old', 1200);
    $statement->bindValue(':category', "Smartphones");
    $statement->bindValue(':stock', $faker->numberBetween(0, 100));
    $statement->execute();

    //iphone SE
    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :stock)');
    $statement->bindValue(':title',"Iphone SE" );
    $statement->bindValue(':description', $faker->paragraph());
    $statement->bindValue(':image', '\public\images\iphone\iphonese.jpg');
    $statement->bindValue(':price_new', 800);
    $statement->bindValue(':price_old', 900);
    $statement->bindValue(':category', "Smartphones");
    $statement->bindValue(':stock', $faker->numberBetween(0, 100));
    $statement->execute();

    //Huawei nova 8i
    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :stock)');
    $statement->bindValue(':title',"HUAWEI Nova 8i" );
    $statement->bindValue(':description', "6.67, 6128GB, 64+8+2+216MP, 4300mAh (Neumann-L21D)Moonlight Silver");
    $statement->bindValue(':image', '\public\images\huawei\HUAWEI Nova 8i, 6.67, 6128GB, 64+8+2+216MP, 4300mAh (Neumann-L21D)Moonlight Silver.jpg');
    $statement->bindValue(':price_new', 200);
    $statement->bindValue(':price_old', 300);
    $statement->bindValue(':category', "Smartphones");
    $statement->bindValue(':stock', $faker->numberBetween(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :stock)');
    $statement->bindValue(':title',"HUAWEI Nova 9SE" );
    $statement->bindValue(':description', "6.78, 8128GB, 4000 mAh Crystal Blue");
    $statement->bindValue(':image', '\public\images\huawei\HUAWEI Nova 9SE, 6.78, 8128GB, 4000 mAh Crystal Blue.jpg');
    $statement->bindValue(':price_new', $faker->numberBetween(100,300));
    $statement->bindValue(':price_old', 400);
    $statement->bindValue(':category', "Smartphones");
    $statement->bindValue(':stock', $faker->numberBetween(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :stock)');
    $statement->bindValue(':title',"HUAWEI Nova Y70" );
    $statement->bindValue(':description', "6.75, 4128GB, 6000 mAh Midnight Black");
    $statement->bindValue(':image', '\public\images\huawei\HUAWEI Nova Y70, 6.75, 4128GB, 6000 mAh Midnight Black.jpg');
    $statement->bindValue(':price_new', $faker->numberBetween(100,300));
    $statement->bindValue(':price_old', 400);
    $statement->bindValue(':category', "Smartphones");
    $statement->bindValue(':stock', $faker->numberBetween(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :stock)');
    $statement->bindValue(':title',"SAMSUNG A22" );
    $statement->bindValue(':description', "5G, 6.6, 464GB, 5000mAh (SM-A226BZWUEUC) White Dual SIM");
    $statement->bindValue(':image', '\public\images\samsung phone\SAMSUNG A22 5G, 6.6, 464GB, 5000mAh (SM-A226BZWUEUC) White Dual SIM.jpg');
    $statement->bindValue(':price_new', null);
    $statement->bindValue(':price_old', 400);
    $statement->bindValue(':category', "Smartphones");
    $statement->bindValue(':stock', $faker->numberBetween(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :stock)');
    $statement->bindValue(':title',"SAMSUNG A32" );
    $statement->bindValue(':description', "6.4, 4128GB, 64+8+5+520MP, 5000mAh (SM-A325FLVGEUC) Violet Dual SIM");
    $statement->bindValue(':image', '\public\images\samsung phone\SAMSUNG A32, 6.4, 4128GB, 64+8+5+520MP, 5000mAh (SM-A325FLVGEUC) Violet Dual SIM.jpg');
    $statement->bindValue(':price_new', null);
    $statement->bindValue(':price_old', 450);
    $statement->bindValue(':category', "Smartphones");
    $statement->bindValue(':stock', $faker->numberBetween(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :stock)');
    $statement->bindValue(':title',"SAMSUNG Galaxy A03" );
    $statement->bindValue(':description', "6.5, 464GB, 48+25MP, 5000 mAh (SM-A035GZBGEUC) Blue");
    $statement->bindValue(':image', '\public\images\samsung phone\SAMSUNG Galaxy A03, 6.5, 464GB, 48+25MP, 5000 mAh (SM-A035GZBGEUC) Blue.jpg');
    $statement->bindValue(':price_new', null);
    $statement->bindValue(':price_old', 450);
    $statement->bindValue(':category', "Smartphones");
    $statement->bindValue(':stock', $faker->numberBetween(0, 100));
    $statement->execute();
?>