<?php require_once '../../views/partials/header.php'; 

if(!isset($_SESSION['user'])){
    session_start();
}

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="">Shopper</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <form method="POST" action="">
                                        <button class="dropdown-item" name="list" value="all" >All Products</button>
                                    </form>
                                </li>
                                <li><hr class="dropdown-divider" /></li>
                                <li>
                                    <form method="POST" action="">    
                                        <button class="dropdown-item" name="list" value="popular">Popular Items</button>
                                    </form>
                                </li>
                                <li>
                                    <form method="POST" action="">
                                        <button class="dropdown-item" name="list" value="new">New Arrivals</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark mx-1" type="submit">
                        <i class="bi bi-person-circle me-1"></i>
                            Anonymous
                        </button>
                    </form>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                    
                </div>
            </div>
        </nav>