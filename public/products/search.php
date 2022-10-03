<?php

$search = $_GET['search'];
if (isset($search)) {
    require_once '../../views/partials/navbar.php';

    $statement = $db->prepare("SELECT title, image, price_new, price_old FROM products WHERE title LIKE :title");
    $statement->bindValue(":title", "%$search%");
    $statement->execute();
    $modelsList = $statement->fetchAll(PDO::FETCH_ASSOC);

    require_once '../../views/partials/productCard.php';
} else {
    header('Location: index.php');
    exit;
}
?>
