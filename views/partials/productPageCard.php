<!-- TODO: breadcrumbs -->


<section class="py-auto" >
    <div class="container px-4 px-lg-5 my-5 " id="section" style="padding: 100px;">
        <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg">
                        <img class="card-img-top mb-5 mb-md-0 w-100 h-100" style="padding: 20px;"src="<?php echo $row['image'] ?>" alt="...">
                    </a>
                </div>
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="float-right p-3 text-danger">&times;</span>
        </button>
                            <img class="card-img-top mb-5 mb-md-0 w-100 h-100" src="<?php echo $row['image'] ?>" alt="...">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder"><?php echo $row['title'] ?></h1>
                    <div class="fs-5 mb-5">
                        <?php if (isset($row['price_new'])) : ?>
                            <div class="badge bg-danger  text-white position-absolute p-2" style="top: 0.5rem; right: 0.5rem; font-size: 15pt;">Sale</div>
                        <?php endif ?>
                    </div>
                    <p class="lead"><?php echo $row['description'] ?></p>
                    <?php if (isset($row['price_new'])) : ?>
                        <span style="text-decoration: line-through" class="lead text-muted text-decoration-line-through"><?php echo  "$" . $row['price_old'] ?></span>
                        <span class="text-danger font-weight-bold lead"> <?php echo "$" . $row['price_new']  ?></span>
                    <?php else : ?>
                        <?php echo "$" . $row['price_old']  ?>
                    <?php endif ?>

                    <div class="d-flex" style="margin-top: 30px;">
                        <!-- <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem"> -->

                        <div class="col-lg-5 col-md-4 mb-8 mb-lg-0">
                            <!-- Quantity -->
                            <div class="d-flex mb-4" style="max-width: 300px; margin-left: -13px;">
                                <button class="btn btn-primary px-3 me-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                    <i class="fa fa-minus"></i>
                                </button>

                                <div class="form-outline px-3 me-2">
                                    <input style="width: 60px !important;" id="form1" min="0" name="quantity" value="1" type="number" class="form-control text-center" />
                                </div>

                                <button class="btn btn-primary px-3 ms-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                    <i class="fa fa-plus"></i>
                                </button>

                                <div class="text-center px-5">
                                    <form method="POST" action="add-cart.php?back=<?php echo $row["product_id"]; ?>">
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="productID" value="<?php echo $row["product_id"]; ?>">
                                        <input type="submit" class="btn btn-primary mt-auto" value="Add to cart">
                                    </form>
                                </div>
                            </div>
                            <!-- Quantity -->

                        </div>

                    </div>

                </div>
        </div>
    </div>
</section>