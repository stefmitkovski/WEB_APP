<?php

$quantity = $_POST["quantity"];
$productID = $_POST["productID"];
 
if($quantity && $productID){

 
$cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
$cart = json_decode($cart);

$repeat = 0;
foreach ($cart as $c)
{
    if ($c->productID == $productID)
    {
        $c->quantity = $c->quantity + 1;
        $repeat = 1;
    }
}

if(!$repeat){
    array_push($cart, array(
        "productID" => $productID,
        "quantity" => $quantity,
    ));
}
    
setcookie("cart", json_encode($cart));

} 


 if (isset($_GET['back'])) {
    $w = $_GET['back'];
    header("Location: productPage.php?pom=$w");
 }else{header("Location: index.php");}


?>