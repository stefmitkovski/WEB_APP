<?php
 
$productID = $_POST["productID"];

if($productID != NULL){
 
$cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
$cart = json_decode($cart);
 
$new_cart = array();
foreach ($cart as $c){

    if ($c->productID != $productID)
    {
        array_push($new_cart, $c);
    }
}
setcookie ("cart", "", time() - 3600);
if(!empty($new_cart)){
    setcookie("cart", json_encode($new_cart));
}
}

header("Location: cart.php");
