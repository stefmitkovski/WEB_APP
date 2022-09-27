<?php
 
if($_POST["increment"]){

$productID = $_POST["increment"];
$cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
$cart = json_decode($cart);
 
foreach ($cart as $c)
{
    if ($c->productID == $productID)
    {
        $c->quantity = $c->quantity + 1;
    }
}
 
setcookie("cart", json_encode($cart));

}else if($_POST["decrement"]){

    $productID = $_POST["decrement"];
    $cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
    $cart = json_decode($cart);
     
    foreach ($cart as $c)
    {
        if ($c->productID == $productID)
        {
            if($c->quantity > 1)
                $c->quantity = $c->quantity - 1;
        }
    }
     
    setcookie("cart", json_encode($cart));

}

header("Location: cart.php");
