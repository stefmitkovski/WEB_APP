<!-- Section-->
<section class="py-12">
    <div class="container px-7 px-lg-7 mt-7" >
        <div class="row gx-7 gx-lg-8 row-cols-4 row-cols-md-8 row-cols-xl-10 justify-content-center" >
            <?php foreach ($modelsList as $row): ?>
            <div class="col mb-9" style="margin: 10px;">
                <div class="card h-100 " id="card">
                    <!-- Sale badge-->
                    <?php if(isset($row['price_new'])): ?> 
                    <div class="badge bg-danger text-white position-absolute p-2" style="top: 0.5rem; right: 0.5rem; font-size: 12pt;">Sale</div>
                    <?php endif ?>
                    <!-- Product image-->
                    <img class="card-img-top w-70 p-3" src='<?php echo $row['image'] ?>' alt="<?php echo $row['title'] ?>" />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center" >
                            <!-- Product name-->
                            <h5 class="fw-bolder"><a href="../../public/products/productPage.php?pom=<?php echo $row["product_id"]; ?>" class="title"> <?php echo $row['title'] ?></a></h5>
                            <!-- Product price-->
                            <?php if(isset($row['price_new'])): ?>
                            <span style="text-decoration: line-through" class="text-muted text-decoration-line-through"><?php echo  "$" . $row['price_old'] ?></span>
                            <span class="text-danger font-weight-bold"> <?php echo "$".$row['price_new']  ?></span>
                            <?php else: ?>
                            <?php echo "$".$row['price_old']  ?>
                            <?php endif ?>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-3 pt-0 border-top-0 bg-transparent">
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

