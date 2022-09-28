<?php
require_once '../../database.php';

include '../../models/ProductModel.php';

$models = new ProductModel($db);
require_once '../../views/partials/navbar.php';
?>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top: -150px;">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="banner images/banner1.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="banner images/banner2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="banner images/banner3.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="z-index: 1;">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="z-index: 1; ">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<div class="container" id="allproducts" style="margin-top: 30px;">
    <div class="row">
        <div class="col-12 border border-primary">
            <form name="sort" action="products.php" method="post">Sorty By
                <select name="order" onchange="this.form.submit()">
                    <option value="choose"></option>
                    <option value="l2h">Price Lowest to Highest</option>
                    <option value="h2l">Price Highest to Lowest</option>
                    <option value="az">A-Z</option>
                    <option value="za">Z-A</option>
                </select>
            </form>
        </div>
        <div class="col-3 border border-secondary">
            Filter By:
            <form action='' method='POST' class="row">
                Brand: </br>
                    <input type='checkbox' value='apple' name='brand'> Apple
                    <input type='checkbox' value='dell' name='brand' >Dell
                    <input type='checkbox' value='samsung' name='brand'>Samsung
                    <input type='checkbox' value='hp' name='brand' >HP
                    <input type='checkbox' value='sony' name='brand'>Sony
                    <input type='checkbox' value='lg' name='brand' >LG
               
                <input type="submit" value="Sort">
            </form>
        </div>
        <div class="col-9 border border-success">
            <?php
            
            switch ($_POST['brand']) {
                case 'apple':
                    $modelsList = $models->getBrand('Apple');
                    break;
                case 'dell':
                    $modelsList = $models->getBrand('DELL');
                    break;
                case 'hp':
                    $modelsList = $models->getBrand('HP');
                    break;
                case 'samsung':
                    $modelsList = $models->getBrand('SAMSUNG');
                    break;
                case 'sony':
                    $modelsList = $models->getBrand('SONY');
                    break;
                case 'lg':
                    $modelsList = $models->getBrand('LG');
                    break;
                default:
                    $modelsList = $models->getAll();
                    break;
            }
            include '../../views/partials/productCard.php' ?>
        </div>
    </div>
</div>