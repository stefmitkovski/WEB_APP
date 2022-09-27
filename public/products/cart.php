<?php

if (!isset($_COOKIE["cart"])) {
  header("Location: index.php");
}

include_once '../../models/ProductModel.php';
include_once "../../database.php";

$product = new ProductModel($db);
$total = 0;
$cart = json_decode($_COOKIE["cart"]);

require_once '../../views/partials/navbar.php';


?>

<section class="h-100 gradient-custom">
  <div class="container py-5">
    <div class="row d-flex justify-content-center my-4">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Cart - <?php echo count($cart) ?> items</h5>
          </div>
          <?php foreach ($cart as $c) : ?>
            <?php $prod = $product->getSprecific($c->productID); ?>
            <div class="card-body">
              <!-- Single item -->
              <div class="row">
                <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                  <!-- Image -->
                  <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                    <img src="..<?php echo $prod["image"] ?>" class="w-100" alt="<?php echo $prod["title"] ?>" />
                    <a href="#!">
                      <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                    </a>
                  </div>
                  <!-- Image -->
                </div>

                <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                  <!-- Data -->
                  <p><strong><?php echo $prod["title"] ?></strong></p>
                  <p>Description: <?php echo $prod["description"] ?></p>
                  <form action="delete-cart.php" method="POST">
                    <input type="hidden" name="productID" value="<?php echo $c->productID ?>">
                    <button type="submit" class="btn btn-primary btn-sm me-1 mb-2" title="Remove item">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                  <button type="button" class="btn btn-danger btn-sm mb-2" data-mdb-toggle="tooltip" title="Move to the wish list">
                    <i class="fas fa-heart"></i>
                  </button>
                  <!-- Data -->
                </div>

                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                  <!-- Quantity -->
                  <form action="update-cart.php" method="POST">
                    <div class="d-flex mb-4" style="max-width: 300px">
                    <input type="hidden" name="decrement" value="<?php echo $c->productID ?>" >
                      <button class="btn btn-primary px-3 me-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                        <i class="fa fa-minus"></i>
                      </button>
                  </form>
                  <div class="form-outline">
                    <input id="form1" min="0" name="quantity" value="<?php echo $c->quantity ?>" type="number" class="form-control" />
                    <label class="form-label" for="form1">Quantity</label>
                  </div>
                  <form action="update-cart.php" method="POST">
                  <input type="hidden" name="increment" value="<?php echo $c->productID ?>" >
                    <button class="btn btn-primary px-3 ms-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                      <i class="fa fa-plus"></i>
                    </button>
                </div>
                </form>
                <!-- Quantity -->

                <!-- Price -->
                <p class="text-start text-md-center">
                  <?php if ($prod["price_new"]) : ?>
                    <strong>$<?php echo $prod["price_new"] ?></strong>
                    <?php $total = $total + $prod["price_new"] * $c->quantity ?>
                  <?php else : ?>
                    <strong>$<?php echo $prod["price_old"] ?></strong>
                    <?php $total = $total + $prod["price_old"] * $c->quantity ?>
                  <?php endif; ?>
                </p>
                <!-- Price -->
              </div>
            </div>
            <!-- Single item -->
          <?php endforeach; ?>
          <hr class="my-4" />
        </div>
      </div>
      <div class="card mb-4">
        <div class="card-body">
          <p><strong>Expected shipping delivery</strong></p>
          <p class="mb-0">12.10.2020 - 14.10.2020</p>
        </div>
      </div>
      <div class="card mb-4 mb-lg-0">
        <div class="card-body">
          <p><strong>We accept</strong></p>
          <img class="me-2" width="45px" src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg" alt="Visa" />
          <img class="me-2" width="45px" src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg" alt="American Express" />
          <img class="me-2" width="45px" src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg" alt="Mastercard" />
          <img class="me-2" width="45px" src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.webp" alt="PayPal acceptance mark" />
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mb-4">
        <div class="card-header py-3">
          <h5 class="mb-0">Summary</h5>
        </div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
              Products
              <span>$<?php echo $total; ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
              Shipping
              <span>Gratis</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
              <div>
                <strong>Total amount</strong>
                <strong>
                  <p class="mb-0">(including VAT)</p>
                </strong>
              </div>
              <span><strong>$<?php echo $total * 1.1 ?></strong></span>
            </li>
          </ul>

          <button type="button" class="btn btn-primary btn-lg btn-block">
            Go to checkout
          </button>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>