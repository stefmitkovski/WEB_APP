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
        <div class="col-3 border border-secondary">
        <form action="product.php#allproducts" method="POST" id="qrcodeRedirectForm"><b> Sorty By:</b>
                <select name="order" id="order">
                    <option value="choose"></option>
                    <option value="l2h">Price Lowest to Highest</option>
                    <option value="h2l">Price Highest to Lowest</option>
                    <option value="az">A-Z</option>
                    <option value="za">Z-A</option>
                </select>
                </br></br>
            <b>Filter By:</b>
            </br> <b> Brand: </b></br>
            <div class="form-check">
                <input type='checkbox' value='all' name="brand[]" id="AllProducts" class="form-check-input" checked>All Products
            </div>
            <div class="form-check">
                <input type='checkbox' value='apple' name="brand[]" class="form-check-input">Apple
            </div>
            <div class="form-check">
                <input type='checkbox' value='dell' name="brand[]" class="form-check-input">Dell
            </div>
            <div class="form-check">
                <input type='checkbox' value='samsung' name="brand[]" class="form-check-input">Samsung
            </div>
            <div class="form-check">
                <input type='checkbox' value='hp' name="brand[]" class="form-check-input">HP
            </div>
            <div class="form-check">
                <input type='checkbox' value='sony' name="brand[]" class="form-check-input">Sony
            </div>
            <div class="form-check">
                <input type='checkbox' value='lg' name="brand[]" class="form-check-input">LG
            </div>

            </br><b> Category:</b> </br>
            <div class="form-check">
                <input type='checkbox' value='TV' name='category[]' class="form-check-input">TV
            </div>
            <div class="form-check">
                <input type='checkbox' value='Smartphone' name='category[]' class="form-check-input">Smartphones
            </div>
            <div class="form-check">
                <input type='checkbox' value='PC and Laptop' name='category[]' class="form-check-input">PC and Laptop
            </div>
            <div class="form-check">
                <input type='checkbox' value='Headphones' name='category[]' class="form-check-input">Headphones
            </div>
            </br>
            <div>
                <input type='submit' value='Filter' name="submit" class="btn-primary float-right"  id="sortForm" >
            </div>

            <?php

            $arr = [];
            if (isset($_POST['brand'])) {
                if (!empty($_POST['brand'])) {
                    $i = 0;
                    foreach ($_POST['brand'] as $value) {
                        $i++;
                        $arr[$i] = $value;
                    }
                }
            }

            $arr2 = [];
            if (isset($_POST['category'])) {
                if (!empty($_POST['category'])) {
                    $j = 0;
                    foreach ($_POST['category'] as $value) {
                        $j++;
                        $arr2[$j] = $value;
                    }
                }
            }
            $sort = 1;
            if ($_POST['order'] == 'l2h') {
                $sort = 4;
            }elseif ($_POST['order'] == 'h2l') {
                $sort = 3;
            }elseif ($_POST['order'] == 'az' || $_POST['order'] == 'choose') {
                $sort = 1;
            }elseif ($_POST['order'] == 'za') {
                $sort = 2;
            }
            if (count($arr2) == 0) {
                if (count($arr) > 1) {
                    $modelsList = $models->getArrayBrand($arr,$sort);
                } elseif (reset($arr) == "all") {
                    $modelsList = $models->getAll(1);
                } else {
                    $modelsList = $models->getBrand(reset($arr),$sort);
                }
            } elseif (count($arr) == 0) {
                if (count($arr2) > 1) {
                    $modelsList = $models->getArrayCategory($arr2,$sort);
                } else {
                    $modelsList = $models->getByCategory(reset($arr2),$sort);
                }
            } elseif (count($arr2) > 0 && count($arr2) > 0) {
                $modelsList = $models->getFromBothLists($arr, $arr2, $sort);
            }elseif(count($arr)==0 && count($arr2)==0 && $sort ==1){
                $modelsList = $models->getAll($sort);
            }


            ?>
        </form>
        </div>
        <div class="col-9 border border-secondary p-auto" >
            <?php
            if($_SERVER['REQUEST_METHOD'] != 'POST'){
                $modelsList = $models->getAll($sort);
            }
            
            include '../../views/partials/productCard.php';
            ?>
        </div>
    </div>
</div>

<!-- Footer-->
<footer class="py-5 bg-dark" style="margin-top: 50px;">
    <div class="container">
        <p class="m-0 text-center text-primary"> &copy; Elektro 2022</p>
        <p class=" text-center text-white"> 32/2017 & 195/2017 WEB APP</p>
    </div>
</footer>

</body>

</html>