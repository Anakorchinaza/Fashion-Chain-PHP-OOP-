<?php
    $page_title = "Product Details";
    include_once "proheader.php";
    include_once "fash/admin.php";
    //include_once "fash/product.php";

    if (isset($_REQUEST['categoryid'])) {
       $obj = new Admin();
       $category = $obj->getCategory($_REQUEST['categoryid']);
    }
?>

<div class="container-fluid mt-4">
    <?php include_once "catnav.php" ?>
</div>

    <?php

        if (isset($_REQUEST['productid'])) {
            include_once "fash/product.php";

            $pro = new Product();
            $product = $pro->getSingleProduct($_REQUEST['productid']);

            //  echo "<pre>";
            //  print_r($product);
            //  echo "</pre>";
             //exit();


        if ($product) {      
            foreach ($product as $key => $value) {
                # code...
            }
    ?>
        <div class="bg-light py-4">

        
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-md-4"> 
                        <div class="shadow">
                        <img src="upload/<?php echo $value['img_url']?>" alt="product image" class="img-fluid">
                        </div>
                    </div>

                    <div class="col-md-8">
                        <h4 class="fw-bold"><?php echo $value['product_name'] ?></h4>
                        <hr>
                        <p>Product Description:</p>
                        <p><?php echo $value['product_description'] ?></p>

                        <div class="row">
                            <div class="col-md">
                                <h5>&#8358;<?php echo number_format($value['product_price'], 2) ?></h5>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md">
                                <button class="btn btn-outline-primary px-4"><i class="fa fa-shopping-cart me-2"></i>Add to Wishlist</button>
                            </div>
                        </div>
                        
                        <hr class="mt-3">

                        <div class="row">
                    
                            <div class="col-md">
                                <h4 class="fw-bold">Brand Information</h4>
                                <p><span style="font-size:18px; font-weight:200">Brand Name:</span> <?php echo $value['brand_name'] ?></p>
                                <p><span style="font-size:18px; font-weight:200">Website:</span> <?php echo $value['website'] ?></p>
                                <p><span style="font-size:18px; font-weight:200">Address:</span> <?php echo $value['address'] ?></p>
                                <p><span style="font-size:18px; font-weight:200">Phone Number:</span> <?php echo $value['phoneno'] ?></p>
                            </div>


                        </div>

                    </div>

                </div>
            </div>

        </div>


    <?php
            
        }
        }else{
            echo "Something went wrong";
        }


    ?>


    
</div>
<?php include_once "profooter.php" ?>

            