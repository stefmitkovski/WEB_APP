<!-- Section-->
<section class="py-8">
    <div class="container px-7 px-lg-7 mt-7">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-5 row-cols-xl-7 justify-content-center">
            <?php foreach ($modelsList as $row): ?>
            <div class="col mb-7">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <?php if(isset($row['price_new'])): ?> 
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                    <?php endif ?>
                    <!-- Product image-->
                    <img class="card-img-top" src='..<?php echo $row['image'] ?>' alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder"><?php echo $row['title'] ?></h5>
                            <!-- Product price-->
                            <?php if(isset($row['price_new'])): ?>
                            <span style="text-decoration: line-through" class="text-muted text-decoration-line-through"><?php echo $row['price_old'] . "$" ?></span>
                            <?php echo $row['price_new'] . "$" ?>
                            <?php else: ?>
                            <?php echo $row['price_old'] . "$" ?>
                            <?php endif ?>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <form method="POST" action="add-cart.php">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="productID" value="<?php echo $row["product_id"]; ?>">
                                <input type="submit" class="btn btn-primary mt-auto" value="Add to cart">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>


