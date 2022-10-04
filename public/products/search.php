<?php

$search = $_GET['search'];
if (isset($search)) {
    require_once '../../views/partials/navbar.php';

    $statement = $db->prepare("SELECT * FROM products WHERE title LIKE :title");
    $statement->bindValue(":title", "%$search%");
    $statement->execute();
    $modelsList = $statement->fetchAll(PDO::FETCH_ASSOC);
} else {
    header('Location: index.php');
    exit;
}
?>



<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col-2 ">
            <p><?php foreach ($modelsList as $row) {
                    $br++;
                }
                echo $br; ?> results for <b> "<?php echo $search ?>"</b></p>
            <div>
                <a href="product.php?sort=all#allproducts"><button class="btn-outline-primary float-left" style="border-radius: 20px; padding: 7px;">View All Products ></button></a>
            </div>
        </div>
        <div class="col-10 border p-auto">
            <?php
            require_once '../../views/partials/productCard.php';

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