<?php
    $page_title = "Products";
    include_once "header.php";
    include_once "fash/admin.php";
?>

<div class="container mt-4">
   <?php include_once "catnav.php" ?>
    </div>



    <div class="row mt-4">
        <div class="col-md-12">
            <h3 class="mt-4">
                <?php 
                $cat = new Admin();
                $cate = $cat->getCategory($_REQUEST['category']);
                echo $cate['category_name']; 
                
                ?>
            </h3>
            <hr>

           <div class="row">
                <?php

                   
                    
                    //if (isset($_REQUEST['category'])) {
            
                        include_once "fash/product.php";
                        $b = $_REQUEST['category'];
                        // var_dump($b);
                        // exit;
                        $pro = new Product();
                        $products = $pro->getProductByCategory($b);
                    
    
                        //  echo "<pre>";
                        //  print_r($products);
                        //  echo "</pre>";
                        //  exit;

                    if (!empty($products)) {
                      
                        foreach ($products as $key => $value) {
                ?>

                        <div class="col-md-2 mb-3">
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
                ?>

                <?php
                }else{
                    
                    echo "Category Not Avaliable";
                }
                //}   
                ?>
           </div>
        </div>
    </div>
</div>


<?php include_once "footer.php" ?>