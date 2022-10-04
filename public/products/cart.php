<?php
require_once '../../views/partials/navbar.php';
?>
<?php if (isset($_COOKIE["cart"])) : ?>
  <?php
  include_once '../../models/ProductModel.php';
  include_once "../../database.php";

  $product = new ProductModel($db);
  $total = 0;
  $cart = json_decode($_COOKIE["cart"]);

  ?>

  <section class="h-100 gradient-custom">
    <div class="container py-5">
      <div class="col-md-4 float-right" style="top: 25px; margin-bottom: 20px;">
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
                <span>Free</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>Total amount</strong>
                  <strong>
                    <p class="mb-0">(including 20% VAT)</p>
                  </strong>
                </div>
                <span><strong>$<?php echo $total * 1.2 ?></strong></span>
              </li>
            </ul>

            <a href="checkout.php" type="button" class="btn btn-primary btn-lg btn-block">
              Go to checkout
            </a>
          </div>
        </div>
      </div>

      <div class="row d-flex justify-content-center my-4">

        <div class="col-md-12">
          <div class="card mb-4">
            <div class="card-header py-3">
              <h5 class="mb-0">Cart - <?php
                                      if (isset($_COOKIE["cart"])) {
                                        $cart = json_decode($_COOKIE["cart"]);
                                        $total = 0;
                                        foreach ($cart as $c) {
                                          $total = $total + $c->quantity;
                                        }
                                        echo $total;
                                      } else {
                                        echo "0";
                                      }
                                      ?> items</h5>
            </div>
            <?php foreach ($cart as $c) : ?>
              <?php $prod = $product->getSpecific($c->productID); ?>
              <div class="card-body">
                <!-- Single item -->
                <div class="row">
                  <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                    <!-- Image -->
                    <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                      <img src="<?php echo $prod["image"] ?>" class="w-100" alt="<?php echo $prod["title"] ?>" />
                      <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                      </a>
                    </div>
                    <!-- Image -->
                  </div>

                  <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                    <!-- Data -->
                    <p><strong><a href="../../public/products/productPage.php?pom=<?php echo $prod["product_id"]; ?>"> <?php echo $prod['title'] ?></a></strong></p>
                    <p>Description: <?php echo $prod["description"] ?></p>
                    <form action="delete-cart.php" method="POST">
                      <input type="hidden" name="productID" value="<?php echo $c->productID ?>">
                      <button type="submit" class="btn btn-outline-danger btn-sm me-1 mb-2" title="Remove item">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                    <!-- Data -->
                  </div>

                  <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <!-- Quantity -->
                    <form action="update-cart.php" method="POST">
                      <div class="d-flex mb-5  p-2" style="max-width: 300px">
                        <input type="hidden" name="decrement" value="<?php echo $c->productID ?>">
                        <button class="btn btn-primary px-3 me-2 h-100" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                          <i class="fa fa-minus"></i>
                        </button>
                    </form>
                    <div class="form-outline">
                      <input id="form1" min="0" name="quantity" value="<?php echo $c->quantity ?>" type="number" class="form-control" />
                      <label class="form-label" for="form1">Quantity</label>
                    </div>
                    <form action="update-cart.php" method="POST">
                      <input type="hidden" name="increment" value="<?php echo $c->productID ?>">
                      <button class="btn btn-primary px-3 ms-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                        <i class="fa fa-plus"></i>
                      </button>
                  </div>
                  </form>
                  <!-- Quantity -->

                  <!-- Price -->
                  <p class="text-start text-md-center">
                    <h7>Price: </br></h7>
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
              <hr class="my-4" />
              <!-- Single item -->
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="card mb-4">
          <div class="card-body">
            <p><strong>Expected shipping delivery</strong></p>

            <p class="mb-0" id="date"></p>
            <script>
              let currentdate = new Date();
              let onemonth = new Date(currentdate.setMonth(currentdate.getMonth() + 1));
              let threemonth = new Date(currentdate.setMonth(currentdate.getMonth() + 3));
              const D = new Date(onemonth);
              const C = new Date(threemonth);
              let ff = (D.getDate()) + "." + (D.getMonth() + 1) + "." + (D.getFullYear());
              let bb = (C.getDate()) + "." + (C.getMonth() + 1) + "." + (C.getFullYear());
              $("#date").append(ff + " - " + bb);
            </script>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body">
            <p><strong>We accept</strong></p>
            <img class="me-2" width="50px" src="\public\images\visa.png" alt="Visa" />
            <img class="me-2" width="50px" src="\public\images\amex.png" alt="American Express" />
            <img class="me-2" width="50px" src="\public\images\master.png" alt="Mastercard" />
            <img class="me-2" width="50px" src="\public\images\paypal.png" alt="PayPal acceptance mark" />
          </div>
        </div>
    </div>
    </div>
  </section>
<?php else : ?>
  <div class="row py-5">
    <div class="offset-lg-3 col-lg-6 col-md-12 col-12 text-center">
      <img src="../images/bag.svg" alt="bags" class="img-fluid mb-4">
      <h2>Your shopping cart is empty</h2>
      <p class="mb-4">
        Return to the store to add items for your delivery slot. Before proceed to checkout you must add some products to your shopping cart. You will find a lot of interesting products on our shop page.
      </p>
      <a href="index.php" class="btn btn-primary">Explore Products</a>
    </div>
  </div>
<?php endif; ?>

<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-primary"> &copy; Elektro 2022</p>
    <p class=" text-center text-white"> 32/2017 & 195/2017 WEB APP</p>
  </div>
</footer>
</body>