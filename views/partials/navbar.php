<?php

require_once '../../views/partials/header.php';
?>
<style>
    <?php include '../../public/app.css' ?>
</style>
<?php if(!isset($_SESSION['user'])): ?>
<section>
    <p class="no">Don't have an account yet? <a href="#" data-toggle="modal" data-target="#exampleModal">Sign up</a> and get 20% off on all products!</p>
</section>
<?php endif;?>
<nav class="navbar navbar-expand-lg  navbar-dark bg-dark " style="margin: 30px; border-radius:50px; z-index: 100;">
    <a class="navbar-brand" href="index.php"><img src="logo/elektro1-1belo.png" height="60vh" style="padding: 10px;" alt="Elektro"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto justify-content-center" style="width: 100%;">

            <li class="nav-item active " style="width: 80%;">
                <form class="form-inline my-1 my-lg-0 bg-nav ">
                    <input class="form-control mr-sm-2 bg-nav white-text" style="width: 70%;" type="search" placeholder="Search Products" aria-label="Search">
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    All Categories
                </a>
                <div class="dropdown-menu bg-dark " aria-labelledby="navbarDropdown">
                    <a class="dropdown-item white-text" href="#">All Categories</a>
                    <a class="dropdown-item white-text" href="#">TV</a>
                    <a class="dropdown-item white-text" href="#">Smartphones</a>
                    <a class="dropdown-item white-text" href="#">PC & Laptops</a>
                    <a class="dropdown-item white-text" href="#">Headphones</a>
                </div>
            </li>
            <button class="btn btn-outline-primary my-2 my-sm-0 rounded-circle" type="submit"><i class="fa fa-search"></i></button>
            </form>
            </li>
        </ul>
        <?php if(!isset($_SESSION['user'])): ?>
        <div style="width: 26%; display: flex; position: relative;">
            <button class="btn btn-outline-primary mx-1 rounded-pill" type="submit" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-user me-1"></i>
                Login/Sign Up
            </button>
            <form class="d-flex" action="cart.php">
                <button class="btn btn-outline-primary rounded-pill" type="submit">
                    <i class="fa-solid fa-cart-shopping me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">
                        <?php
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
                        ?>
                    </span>
                </button>
            </form>
        </div>
        <?php endif; ?>
    </div>
</nav>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">


        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header"><img src="logo/elektro1-1.png" width="50%" height="50vh" alt="Elektro" style="margin-left:22%">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="login-wrap">
                    <div class="login-html">
                        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab tabs" style="cursor: pointer;">Sign In</label>
                        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab tabs" style="cursor: pointer;">Sign Up</label>
                        <div class="login-form">
                            <form action="login.php" method="POST">
                                <div class="sign-in-htm">
                                    <div class="group">
                                    <label for="user" class="label">Username</label>
                                    <input id="user" type="text" class="input">
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Password</label>
                                    <input id="pass" type="password" class="input" data-type="password">
                                </div>
                                <div class="group">
                                    <input id="check" type="checkbox" class="check" checked>
                                    <label for="check" style="cursor: pointer;"><span class="icon"></span> Keep me Signed in</label>
                                </div>
                                <div class="group">
                                    <input type="submit" class="button" value="Sign In">
                                </div>
                            </form>
                                <div class="hr"></div>
                                <div class="foot-lnk">
                                    <a href="#forgot">Forgot Password?</a>
                                </div>
                            </div>
                            <div class="sign-up-htm">
                                <form action="register.php" method="POST">
                                <div class="group">
                                    <label for="pass" class="label">Email Address</label>
                                    <input id="pass" type="email" class="input" name="email" required>
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Phone number</label>
                                    <input id="pass" type="tel" class="input" name="phone" required>
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Password</label>
                                    <input id="pass" type="password" class="input" data-type="password" name="password" required>
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Repeat Password</label>
                                    <input id="pass" type="password" class="input" data-type="password" name="repeatpassword" required>
                                </div>
                                <div class="group">
                                    <input type="submit" class="button" value="Sign Up">
                                </div>
                                <div class="hr"></div>
                                </form>
                                <div class="foot-lnk">
                                    <label for="tab-1" id="member">Already a Member?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>