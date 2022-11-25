<?php
    $page_title = "Products";
    include_once "header.php";
    include_once "fash/admin.php";
?>

    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-12">
            <?php include_once "catnav.php" ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
            <h3 class="mt-4">
                <?php 
                $cat = new Admin();
                $cate = $cat->getCategory($_REQUEST['category']);
                echo $cate['category_name']; 
                
                ?>
            </h3>
            <hr>
            </div>
        </div>

       
        <?php
            //if (isset($_REQUEST['category'])) {
                include_once "fash/product.php";
                $category = $_REQUEST['category'];
                
                    
                $obj = new Product();

                $product = $obj->getProductByCategory($category);
                // var_dump($product);
                // exit;
                
                //  echo "<pre>";
                //  print_r($product);
                //  echo "</pre>";
                    //exit;

                
                
        ?>

                 
    <div class="row">
        <?php  
        if (count($product) > 0) {
                    foreach ($product as $key => $value) {
                ?>
            <div class="col-md-3 mb-3">
                
                <a href="productview.php?productid=<?php echo $value['product_id'] ?>">
                    <div class="card h-100 shadow">
                        <div class="card-body">
                            <img src="upload/<?php echo $value['img_url'] ?>" alt="product image" class="img-fluid" 
                            style="height:200px;">
                            <h3 class="mt-4" style="font-size:18px;"><?php echo $value['product_name'] ?></h3>
                        </div>
                
                    </div>
                </a>
                
            </div>
            <?php
                    }
                }else{
                    echo "Not available ";     
                }
             ?>
        
    </div>

</div>

<?php include_once "footer.php" ?>



