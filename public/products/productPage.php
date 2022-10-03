<?php
require_once '../../database.php';

include '../../models/ProductModel.php';

$models = new ProductModel($db);
require_once '../../views/partials/navbar.php';

?>
<?php
// function the_function($id,$models) {
// return $models->getSpecific($id); 
//  }

 if (isset($_GET['pom'])) {

  $row = $models->getSpecific($_GET['pom']);
  include '../../views/partials/productPageCard.php';
  }
   ?>

<!-- Footer-->
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-primary"> &copy; Elektro 2022</p>
    <p class=" text-center text-white"> 32/2017 & 195/2017 WEB APP</p>
  </div>
</footer>