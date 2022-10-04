<?php if (isset($_COOKIE['cart'])) :

    require_once '../../views/partials/header.php';
    require_once '../../models/ProductModel.php';
    require_once '../../models/UserModel.php';
    require_once '../../models/TransactionModel.php';
    require_once '../../database.php';
    
    
    $total = 0;
    $numberItems = 0;
    session_start();
    $user = new UserModel($db);
    $product = new ProductModel($db);
    $transaction = new TransactionModel($db);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['email']) && isset($_POST['cc-name']) && isset($_POST['cc-expiration']) && isset($_POST['cc-cvv'])) {
            foreach (json_decode($_COOKIE['cart']) as $c) {
                $transaction->createTranaction($_POST['email'], $c->productID, $c->quantity);
            }
            $transaction->transactionMail($_POST['email'],json_decode($_COOKIE['cart']));
        }
    }

?><div class="container">
<main>
    <div class="py-5 text-center">
        <a href="index.php"><img class="fs-4 primary" src="logo/elektro1-1.png" height="100px" width="400px" alt=""></a>
    </div>

    <div class="row g-5 py-5">
        <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Your cart</span>
                <?php foreach (json_decode($_COOKIE['cart']) as $c){ 
                    $numberItems = $numberItems + $c->quantity;
                }?>
                <span class="badge bg-primary rounded-pill"><?php echo $numberItems; ?></span>
            </h4>
            <ul class="list-group mb-3">
                <?php foreach (json_decode($_COOKIE['cart']) as $c) : ?>
                    <?php $prod = $product->getSpecific($c->productID);?>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0"><?php echo $prod['title']; ?></h6>
                            <small class="text-muted">Quantity: <?php echo $c->quantity ?></small>
                        </div>
                        <?php if ($prod["price_new"]) : ?>
                            <span class="text-muted">$<?php echo $prod["price_new"] ?></span>
                            <?php $total = $total + $prod["price_new"] * $c->quantity ?>
                        <?php else : ?>
                            <span class="text-muted">$<?php echo $prod["price_old"] ?></span>
                            <?php $total = $total + $prod["price_old"] * $c->quantity ?>
                        <?php endif; ?>
                    </li>
                        <?php $total = $total + $total * 0.02;?>
                    </li>
                <?php endforeach; ?>
                <?php if (isset($_SESSION['user'])) : ?>
                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                            <h6 class="my-0">Login promo</h6>
                        </div>
                        <span class="text-success">5%</span>
                    </li>
                    <?php $total = $total - ($total * 0.05); ?>
                <?php endif; ?>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (USD) (Includes VAT)</span>
                    <strong><?php echo '$'.round($total); ?></strong>
                </li>
            </ul>
        </div>
        <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Billing address</h4>
            <form class="needs-validation" action="" method="POST">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">First name</label>
                        <?php if(isset($_SESSION['user'])): ?>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $_SESSION['user'];?>" readonly>
                        <?php else: ?>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                        <?php endif; ?>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">Email </span></label>
                        <?php if(isset($_SESSION['user'])):?>
                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $_SESSION['email'];?>" readonly>
                        <?php else: ?>
                        <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" required>
                        <?php endif; ?>
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                    </div>


                    <div class="col-md-4">
                        <label for="country" class="form-label">Country</label>
                        <select class="form-select" aria-label="Default select example">
                            <option value="MK">Macedonia</option>
                            <option value="SR">Serbia</option>
                            <option value="MN">Montenegro</option>
                            <option value="BH">Bosnia and Hercegovina</option>
                            <option value="HR">Croatia</option>
                            <option value="SL">Slovenia</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="zip" class="form-label">Zip</label>
                        <input type="text" class="form-control" id="zip" placeholder="" required>
                        <div class="invalid-feedback">
                            Zip code required.
                        </div>
                    </div>
                </div>

                <hr class="my-4">
                <h4 class="mb-3">Payment</h4>

                <div class="my-3">
                    <div class="form-check">
                        <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked="" required>
                        <label class="form-check-label" for="credit">Credit card</label>
                    </div>
                    <div class="form-check">
                        <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                        <label class="form-check-label" for="debit">Debit card</label>
                    </div>
                    <div class="form-check">
                        <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
                        <label class="form-check-label" for="paypal">PayPal</label>
                    </div>
                </div>

                <div class="row gy-3">
                    <div class="col-md-6">
                        <label for="cc-name" class="form-label">Name on card</label>
                        <input type="text" name="cc-name" class="form-control" id="cc-name" placeholder="" required>
                        <small class="text-muted">Full name as displayed on card</small>
                        <div class="invalid-feedback">
                            Name on card is required
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="cc-number" class="form-label">Credit card number</label>
                        <input type="text" name="cc-number" class="form-control" id="cc-number" placeholder="" required>
                        <div class="invalid-feedback">
                            Credit card number is required
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="cc-expiration" class="form-label">Expiration</label>
                        <input type="text" name="cc-expiration" class="form-control" id="cc-expiration" placeholder="" required>
                        <div class="invalid-feedback">
                            Expiration date required
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="cc-cvv" class="form-label">CVV</label>
                        <input type="text" name="cc-cvv" class="form-control" id="cc-cvv" placeholder="" required>
                        <div class="invalid-feedback">
                            Security code required
                        </div>
                    </div>
                </div>

                <hr class="my-4">
                <button class="w-100 btn btn-primary btn-lg" type="submit">Confirm Payment</button>
            </form>
        </div>
    </div>
</main>

    </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-primary"> &copy; Elektro 2022</p>
            <p class=" text-center text-white"> 32/2017 & 195/2017 WEB APP</p>
        </div>
    </footer>
<?php else : ?>
<?php header("Location: index.php");
    exit;
endif; ?>