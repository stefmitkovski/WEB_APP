<?php

require_once '../../database.php';
require '../../models/ProductModel.php';

$models = new ProductModel($db);

if (isset($_COOKIE['errors'])) {
  session_destroy();
  $errors = json_decode($_COOKIE['errors']);
  if (!empty($errors)) {
    require_once '../../views/partials/errors.php';
    setcookie("errors", "", time() - 3600);
  }
} else if (!isset($_SESSION['user'])) {
}

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


<div class="container">
  <div class="row-12">

    <div class="col-sm-12 card-deck">
      <h3 class="section-label col-sm "> Top Selling Products </h3>
      <div class="row bor ">
        <?php $modelsList = $models->getPopular();
        include '../../views/partials/productCard.php' ?>
      </div>
    </div>


    <div class="col-sm-12 card-deck">
      <h3 class="section-label col-sm"> Featured Products</h3>
      <div class="row bor">
        <?php $modelsList = $models->getNew();
        include '../../views/partials/productCard.php' ?>
      </div>
    </div>

    <div class="w-100"></div>

    <div class="col-sm-12 card-deck">
      <h3 class="section-label col-sm"> On-sale Products</h3>
      <div class="row bor">
        <?php $modelsList = $models->getOnSale();
        include '../../views/partials/productCard.php' ?>
      </div>
    </div>

    <!-- <div class="col-sm-12 card-deck" style=" margin: 80px 0px;" >
      <div class="row bor justify-content-center" ><div id="allprod" style="width: 100%; height: 100%;"></div>
        <h2 class=" my-auto " > <a  href="product.php#allproducts"><button class="">All Products ></button></a> </h2>
        </div>
      </div>
    </div> -->
    <div class="text-center" style="height: 50px; margin: 100px;">
    <h3 class=" my-auto " > <a  href="product.php#allproducts"><button class="btn-outline-primary" style="border-radius: 30px; padding: 10px;">View All Products ></button></a> </h3>
    </div>
  </div>
  
  
 
</div>




<!-- Footer-->
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-primary"> &copy; Elektro 2022</p>
    <p class=" text-center text-white"> 32/2017 & 195/2017 WEB APP</p>
  </div>
</footer>
</body>

</html>