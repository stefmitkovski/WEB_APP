<?php

require_once '../../database.php';

include '../../models/ProductModel.php';

$models = new ProductModel($db);

// include 'views/foo-list.php';

require_once '../../views/partials/navbar.php';

switch($_POST['list']){
    case 'popular':
        $modelsList = $models->getPopular();
        break;
    case 'new':
        $modelsList = $models->getNew();
        break;
    default:
        $modelsList = $models->getAll();
}

?>

<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With cheaper prices !!!</p>
        </div>
    </div>
</header>

<?php require_once '../../views/partials/productCard.php' ?>

<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p>
    </div>
</footer>
</body>

</html>