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
    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"Iphone 11" );
    $statement->bindValue(':description', $faker->paragraph());
    $statement->bindValue(':image', '\public\images\iphone\iphone11.jpg');
    $statement->bindValue(':price_new', 650);
    $statement->bindValue(':price_old', 800);
    $statement->bindValue(':category', "Smartphone");
    $statement->bindValue(':brand', "Apple");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    //iphone 13 mini
    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"Iphone 13 Mini" );
    $statement->bindValue(':description', $faker->paragraph());
    $statement->bindValue(':image', '\public\images\iphone\iphone_13_mini.jpg');
    $statement->bindValue(':price_new', 800);
    $statement->bindValue(':price_old', 1000);
    $statement->bindValue(':category', "Smartphone");
    $statement->bindValue(':brand', "Apple");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    //iphone SE
    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"Iphone SE 3" );
    $statement->bindValue(':description', $faker->paragraph());
    $statement->bindValue(':image', '\public\images\iphone\iphone_se3.jpg');
    $statement->bindValue(':price_new', 800);
    $statement->bindValue(':price_old', 1000);
    $statement->bindValue(':category', "Smartphone");
    $statement->bindValue(':brand', "Apple");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    //iphone 14 +
    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"Iphone 14 Plus" );
    $statement->bindValue(':description', $faker->paragraph());
    $statement->bindValue(':image', '\public\images\iphone\iphone14plus.jpg');
    $statement->bindValue(':price_new', null);
    $statement->bindValue(':price_old', 1200);
    $statement->bindValue(':category', "Smartphone");
    $statement->bindValue(':brand', "Apple");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    //iphone 14 PRO
    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"Iphone 14 PRO" );
    $statement->bindValue(':description', $faker->paragraph());
    $statement->bindValue(':image', '\public\images\iphone\iphone14pro.jpg');
    $statement->bindValue(':price_new', null);
    $statement->bindValue(':price_old', 1200);
    $statement->bindValue(':category', "Smartphone");
    $statement->bindValue(':brand', "Apple");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

        //iphone 14 pro max
    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"Iphone 14 PRO MAX" );
    $statement->bindValue(':description', $faker->paragraph());
    $statement->bindValue(':image', '\public\images\iphone\iphone14promax.jpg');
    $statement->bindValue(':price_new', null);
    $statement->bindValue(':price_old', 1200);
    $statement->bindValue(':category', "Smartphone");
    $statement->bindValue(':brand', "Apple");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    //iphone SE
    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"Iphone SE" );
    $statement->bindValue(':description', $faker->paragraph());
    $statement->bindValue(':image', '\public\images\iphone\iphonese.jpg');
    $statement->bindValue(':price_new', 800);
    $statement->bindValue(':price_old', 900);
    $statement->bindValue(':category', "Smartphone");
    $statement->bindValue(':brand', "Apple");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    //Huawei nova 8i
    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"HUAWEI Nova 8i" );
    $statement->bindValue(':description', "6.67, 6128GB, 64+8+2+216MP, 4300mAh (Neumann-L21D)Moonlight Silver");
    $statement->bindValue(':image', '\public\images\huawei\HUAWEI Nova 8i, 6.67, 6128GB, 64+8+2+216MP, 4300mAh (Neumann-L21D)Moonlight Silver.jpg');
    $statement->bindValue(':price_new', 200);
    $statement->bindValue(':price_old', 300);
    $statement->bindValue(':category', "Smartphone");
    $statement->bindValue(':brand', "HUAWEI");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"HUAWEI Nova 9SE" );
    $statement->bindValue(':description', "6.78, 8128GB, 4000 mAh Crystal Blue");
    $statement->bindValue(':image', '\public\images\huawei\HUAWEI Nova 9SE, 6.78, 8128GB, 4000 mAh Crystal Blue.jpg');
    $statement->bindValue(':price_new', $faker->numberBetween(100,300));
    $statement->bindValue(':price_old', 400);
    $statement->bindValue(':category', "Smartphone");
    $statement->bindValue(':brand', "HUAWEI");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"HUAWEI Nova Y70" );
    $statement->bindValue(':description', "6.75, 4128GB, 6000 mAh Midnight Black");
    $statement->bindValue(':image', '\public\images\huawei\HUAWEI Nova Y70, 6.75, 4128GB, 6000 mAh Midnight Black.jpg');
    $statement->bindValue(':price_new', $faker->numberBetween(100,300));
    $statement->bindValue(':price_old', 400);
    $statement->bindValue(':category', "Smartphone");
    $statement->bindValue(':brand', "HUAWEI");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"SAMSUNG A22" );
    $statement->bindValue(':description', "5G, 6.6, 464GB, 5000mAh (SM-A226BZWUEUC) White Dual SIM");
    $statement->bindValue(':image', '\public\images\samsung phone\SAMSUNG A22 5G, 6.6, 464GB, 5000mAh (SM-A226BZWUEUC) White Dual SIM.jpg');
    $statement->bindValue(':price_new', null);
    $statement->bindValue(':price_old', 400);
    $statement->bindValue(':category', "Smartphone");
    $statement->bindValue(':brand', "SAMSUNG");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"SAMSUNG A32" );
    $statement->bindValue(':description', "6.4, 4128GB, 64+8+5+520MP, 5000mAh (SM-A325FLVGEUC) Violet Dual SIM");
    $statement->bindValue(':image', '\public\images\samsung phone\SAMSUNG A32, 6.4, 4128GB, 64+8+5+520MP, 5000mAh (SM-A325FLVGEUC) Violet Dual SIM.jpg');
    $statement->bindValue(':price_new', 400);
    $statement->bindValue(':price_old', 450);
    $statement->bindValue(':category', "Smartphone");
    $statement->bindValue(':brand', "SAMSUNG");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"SAMSUNG Galaxy A03" );
    $statement->bindValue(':description', "6.5, 464GB, 48+25MP, 5000 mAh (SM-A035GZBGEUC) Blue");
    $statement->bindValue(':image', '\public\images\samsung phone\SAMSUNG Galaxy A03, 6.5, 464GB, 48+25MP, 5000 mAh (SM-A035GZBGEUC) Blue.jpg');
    $statement->bindValue(':price_new', null);
    $statement->bindValue(':price_old', 450);
    $statement->bindValue(':category', "Smartphone");
    $statement->bindValue(':brand', "SAMSUNG");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"SAMSUNG Galaxy A13" );
    $statement->bindValue(':description', "6.6, 332GB, 5000mAh (SM-A135FZKUEUC) Black");
    $statement->bindValue(':image', '\public\images\samsung phone\SAMSUNG Galaxy A13, 6.6, 332GB, 5000mAh (SM-A135FZKUEUC) Black.jpg');
    $statement->bindValue(':price_new', null);
    $statement->bindValue(':price_old', 500);
    $statement->bindValue(':category', "Smartphone");
    $statement->bindValue(':brand', "SAMSUNG");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"SAMSUNG Galaxy Z Flip4" );
    $statement->bindValue(':description', "5G, 6.7, 8256GB, 3700 mAh Blue");
    $statement->bindValue(':image', '\public\images\samsung phone\SAMSUNG Galaxy Z Flip4 5G, 6.7, 8256GB, 3700 mAh Blue.jpg');
    $statement->bindValue(':price_new', null);
    $statement->bindValue(':price_old', 900);
    $statement->bindValue(':category', "Smartphone");
    $statement->bindValue(':brand', "SAMSUNG");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"Smart TV SAMSUNG QE98QN90 AATXXH" );
    $statement->bindValue(':description', "4k Neo QLED UHD Smart TV SAMSUNG QE98QN90 AATXXH, 98(245cm), 4400Hz, Wifi");
    $statement->bindValue(':image', '\public\images\samsumg tv\samsungtv1.jpg');
    $statement->bindValue(':price_new', 12999);
    $statement->bindValue(':price_old', 14800);
    $statement->bindValue(':category', "TV");
    $statement->bindValue(':brand', "SAMSUNG");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"Smart TV SAMSUNG UE43TU7092 UXXH" );
    $statement->bindValue(':description', "4k UHD Smart TV SAMSUNG UE43TU7092 UXXH, 43 (108cm), 2000Hz, WiFi");
    $statement->bindValue(':image', '\public\images\samsumg tv\samsungtv2.jpg');
    $statement->bindValue(':price_new', 350);
    $statement->bindValue(':price_old', 400);
    $statement->bindValue(':category', "TV");
    $statement->bindValue(':brand', "SAMSUNG");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"Smart TV SAMSUNG UE70TU7172" );
    $statement->bindValue(':description', "4k UHD Smart TV SAMSUNG UE70TU7172 UXXH, 70 (177.8cm), Tizen, 2000Hz PQI, WiFi");
    $statement->bindValue(':image', '\public\images\samsumg tv\samsungtv3.jpg');
    $statement->bindValue(':price_new', 750);
    $statement->bindValue(':price_old', 800);
    $statement->bindValue(':category', "TV");
    $statement->bindValue(':brand', "SAMSUNG");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"Smart TV SAMSUNG QE 75 QN90BATXXH" );
    $statement->bindValue(':description', "4К NEO QLED UHD Smart TV SAMSUNG QE 75 QN90BATXXH, 75(190.5cm), 4500Hz, Quantum Processor 4K, Wifi");
    $statement->bindValue(':image', '\public\images\samsumg tv\samsungtv4.jpg');
    $statement->bindValue(':price_new', null);
    $statement->bindValue(':price_old', 3500);
    $statement->bindValue(':category', "TV");
    $statement->bindValue(':brand', "SAMSUNG");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"Smart TV SAMSUNG QE 43 Q60BAUXXH" );
    $statement->bindValue(':description', "4К QLED UHD Smart TV SAMSUNG QE 43 Q60BAUXXH, 43(108cm), 3100Hz, Quantum Lite 4K, Wifi");
    $statement->bindValue(':image', '\public\images\samsumg tv\samsungtv5.jpg');
    $statement->bindValue(':price_new', 750);
    $statement->bindValue(':price_old', 850);
    $statement->bindValue(':category', "TV");
    $statement->bindValue(':brand', "SAMSUNG");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"SMART LED TV LG 55 UQ70003LBQ" );
    $statement->bindValue(':description', "4k UHD SMART LED TV LG 55 UQ70003LBQ, 55(139.7cm), α5 Gen5 AI, Wifi");
    $statement->bindValue(':image', '\public\images\lg and sony\4k UHD SMART LED TV LG 55 UQ70003LBQ, 55(139.7cm), α5 Gen5 AI, Wifi.jpg');
    $statement->bindValue(':price_new', 400);
    $statement->bindValue(':price_old', 500);
    $statement->bindValue(':category', "TV");
    $statement->bindValue(':brand', "LG");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"SMART OLED TV SONY KD 48 A9BAEP" );
    $statement->bindValue(':description', "4K UHD SMART OLED TV SONY KD 48 A9BAEP, 48(122cm), 4K HDR X1™, wIFI");
    $statement->bindValue(':image', '\public\images\lg and sony\4K UHD SMART OLED TV SONY KD 48 A9BAEP, 48(122cm), 4K HDR X1™, wIFI.jpg');
    $statement->bindValue(':price_new', null);
    $statement->bindValue(':price_old', 1350);
    $statement->bindValue(':category', "TV");
    $statement->bindValue(':brand', "SONY");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"SMART TV SONY KD32W800PCEP" );
    $statement->bindValue(':description', "HD LED SMART TV SONY KD32W800PCEP, 32(81cm), Android TV, HDR, Wifi");
    $statement->bindValue(':image', '\public\images\lg and sony\HD LED SMART TV SONY KD32W800PCEP, 32(81cm), Android TV, HDR, Wifi.jpg');
    $statement->bindValue(':price_new', 349);
    $statement->bindValue(':price_old', 400);
    $statement->bindValue(':category', "TV");
    $statement->bindValue(':brand', "SONY");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"SMART LED TV LG 32 LQ570B6L" );
    $statement->bindValue(':description', "HD Ready SMART LED TV LG 32 LQ570B6LA, 32(81cm), α5 Gen5, Wifi");
    $statement->bindValue(':image', '\public\images\lg and sony\HD Ready SMART LED TV LG 32 LQ570B6LA, 32(81cm), α5 Gen5, Wifi.jpg');
    $statement->bindValue(':price_new', null);
    $statement->bindValue(':price_old', 250);
    $statement->bindValue(':category', "TV");
    $statement->bindValue(':brand', "LG");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"Pink 24‑inch iMac" );
    $statement->bindValue(':description', "Apple M1 chip with 8-core CPU with 4 performance cores and 4 efficiency cores, 8-core GPU, and 16-core Neural Engine
    </br> 8GB unified memory
    </br> 256GB SSD storage
    </br> Two Thunderbolt / USB 4 ports
    </br> Two USB 3 ports");
    $statement->bindValue(':image', '\public\images\mac\imac-2021-pink.jpeg');
    $statement->bindValue(':price_new', null);
    $statement->bindValue(':price_old', 1500);
    $statement->bindValue(':category', "PC and Laptop");
    $statement->bindValue(':brand', "Apple");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"MacBook Pro 13” " );
    $statement->bindValue(':description', "Apple M2 chip</br>
    Up to 24GB memory </br>Up to 2TB storage11</br>Up to 20 hours battery life15 </br>Touch Bar and Touch ID");
    $statement->bindValue(':image', '\public\images\mac\macbook-air-2022.png');
    $statement->bindValue(':price_new', 1199);
    $statement->bindValue(':price_old', 1300);
    $statement->bindValue(':category', "PC and Laptop");
    $statement->bindValue(':brand', "Apple");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"MacBook Air" );
    $statement->bindValue(':description', "16-core Neural Engine</br>13.6-inch Liquid Retina display with True Tone </br>1080p FaceTime HD camera
    </br>MagSafe 3 charging port</br>Two Thunderbolt / USB 4 ports </br>Magic Keyboard with Touch ID </br>Force Touch trackpad </br>35W Dual USB-C Port Power Adapter");
    $statement->bindValue(':image', '\public\images\mac\mba-sg-2.jpeg');
    $statement->bindValue(':price_new', 1999);
    $statement->bindValue(':price_old', 2149);
    $statement->bindValue(':category', "PC and Laptop");
    $statement->bindValue(':brand', "Apple");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"AirPods (3rd Generation)" );
    $statement->bindValue(':description', "Semi in-ear design , Force sensor controls, H1 chip, Bluetooth 5.0");
    $statement->bindValue(':image', '\public\images\airpods\mme73.jpg');
    $statement->bindValue(':price_new', 149);
    $statement->bindValue(':price_old', 169);
    $statement->bindValue(':category', "Headphones");
    $statement->bindValue(':brand', "Apple");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"AirPods Pro (2nd Generation)" );
    $statement->bindValue(':description', "Apple AirPods Pro Wireless Earbuds with MagSafe Charging Case. Active Noise Cancelling, Transparency Mode, Spatial Audio, Customizable Fit, Sweat and Water Resistant. Bluetooth Headphones for iPhone");
    $statement->bindValue(':image', '\public\images\airpods\mwp22.jpeg');
    $statement->bindValue(':price_new', null);
    $statement->bindValue(':price_old', 250);
    $statement->bindValue(':category', "Headphones");
    $statement->bindValue(':brand', "Apple");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title','DELL LATITUDE 5310 13.3" i5-10210U/ 16GB/ 512GB/ WIN' );
    $statement->bindValue('description', 'Dell Latitude 5310 13.3" Notebook - Full HD - 1920 x 1080 - Core i5 i5-10210U 10th Gen 1.6GHz Quad-core (4 Core) - 8GB RAM - 256GB SSD ');
    $statement->bindValue(':image', '\public\images\dell\DELL LATITUDE 5310 13.3 i5-10210U16GB512GBWIN.JPG');
    $statement->bindValue(':price_new', 1999);
    $statement->bindValue(':price_old', 2149);
    $statement->bindValue(':category', "PC and Laptop");
    $statement->bindValue(':brand', "DELL");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"MacBook Air" );
    $statement->bindValue('description', "");
    $statement->bindValue(':image', '\public\images\dell\Vostro35154_976dd280-4b47-42bd-9f83-f80eefe31bfc.jpg');
    $statement->bindValue(':price_new', 899);
    $statement->bindValue(':price_old', 1000);
    $statement->bindValue(':category', "PC and Laptop");
    $statement->bindValue(':brand', "DELL");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"Notebook Dell Vostro 3510" );
    $statement->bindValue('description', 'Notebook Dell Vostro 3510 i5-1135G7 8GB/256GB SSD/Intel Iris Xe/15.6" FullHD/3Cell/Linux');
    $statement->bindValue(':image', '\public\images\dell\Vostro35103_3b19456a-53b6-4464-8929-486dc7f832d8.jpg');
    $statement->bindValue(':price_new', null);
    $statement->bindValue(':price_old', 600);
    $statement->bindValue(':category', "PC and Laptop");
    $statement->bindValue(':brand', "DELL");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"HP 250 G8 i5 - 1135G7 / 8GB / 256GB 32M36EA" );
    $statement->bindValue('description', "HP 250 G8 Full HD, Intel i5-1135G7, 8GB, 256GB, Win 10 Pro (2X7V1EA)");
    $statement->bindValue(':image', '\public\images\hp\HP 250 G8 i5-1135G78GB256GB 32M36EA.jpg');
    $statement->bindValue(':price_new', 515);
    $statement->bindValue(':price_old', 600);
    $statement->bindValue(':category', "PC and Laptop");
    $statement->bindValue(':brand', "HP");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();

    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"HP 250 G7 (Dark ash silver)" );
    $statement->bindValue('description', "HP 250 G7 (Dark ash silver) FHD Intel Celeron N4020 4GB 128GB (197V9EA)");
    $statement->bindValue(':image', '\public\images\hp\HP 250G7 N40204GB128GB SSD 197V9EA.jpg');
    $statement->bindValue(':price_new', 200);
    $statement->bindValue(':price_old', 249);
    $statement->bindValue(':category', "PC and Laptop");
    $statement->bindValue(':brand', "HP");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();
    
    $statement = $db->prepare('INSERT INTO products (title,description,image,price_new,price_old,category,brand,stock)
    VALUES (:title, :description, :image, :price_new, :price_old , :category , :brand , :stock)');
    $statement->bindValue(':title',"INZONE H9 Wireless Noise Cancelling Gaming Headset" );
    $statement->bindValue('description', "Sony-INZONE H9 Wireless Noise Canceling Gaming Headset, Over-ear Headphones with 360 Spatial Sound, WH-G900N ");
    $statement->bindValue(':image', '\public\images\sony-headphones.jpg');
    $statement->bindValue(':price_new', 269);
    $statement->bindValue(':price_old', 300);
    $statement->bindValue(':category', "Headphones");
    $statement->bindValue(':brand', "SONY");
    $statement->bindValue(':stock', rand(0, 100));
    $statement->execute();
    
?>