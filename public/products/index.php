<?php


require_once '../../database.php';

include '../../models/ProductModel.php';

$models = new ProductModel($db);

// include 'views/foo-list.php';

require_once '../../views/partials/navbar.php';

if(!isset($_SESSION['user'])){
  session_start();
}

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
  <div class="row">

    <div class="col">
      <h3 class="section-label col-sm" > Top Selling Products </h3> 
      <div class="row  bor ">
        <?php $modelsList = $models->getPopular(); include '../../views/partials/productCard.php' ?>
     </div>
    </div>


    <div class="col">
      <h3 class="section-label col-sm"> Featured Products</h3>
      <div class="row bor">
        <?php $modelsList = $models->getNew(); include '../../views/partials/productCard.php' ?>
      </div>
    </div>

    <div class="w-100"></div>

    <div class="col ">
      <h3 class="section-label col-sm" > On-sale Products</h3>
      <div class="row bor">
        <?php $modelsList = $models->getOnSale(); include '../../views/partials/productCard.php' ?>
      </div>
    </div>

    <div class="col">
      <h3 class="col-sm" > <a href="#">All Products ></a> </h3>
    </div>

  </div>
</div>



<!-- Footer-->
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p>
  </div>
</footer>
</body>

</html>