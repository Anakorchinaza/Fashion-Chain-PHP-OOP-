<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1  class="text-center">
                FEATURE PRODUCTS
            </h1>
            <hr>

            <div class="row">
                <?php
                    include_once "fash/product.php";

                    $obj = new Product();
                    $products = $obj->featureProduct();

                    if (count($products) > 0) {
                        foreach ($products as $key => $value) {
                ?>
                    <div class="col-md-3 mb-3">
                        <a href="">
                            <div class="card w-75 h-100 shadow">
                                <div class="card-body">
                                    <img src="upload/<?php echo $value['img_url'] ?>" alt="product image" 
                                    class="img-fluid" height="75">
                                    <h3 class="mt-4"><?php echo $value['product_name'] ?></h3>
                                    <h4 class="mt-4">&#8358;<?php echo number_format($value['product_price'], 2) ?></h4>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>

</div>