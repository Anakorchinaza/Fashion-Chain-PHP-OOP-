<?php
     $page_title = "View All product";
    include_once "proheader.php";
    include_once "fash/myusers.php";

    if (!isset($_SESSION['usertype']) || $_SESSION['usertype'] == 'user') {
       
        $msgs = "You don't have access to this page";
        //echo "<div class='alert alert-danger'>You're not a brand</div>";
        //redirect to login page
        header("Location: userprofile.php?msgs=$msgs");
        exit();
    }
?>



    <div class="container-fluid">
    <a href="userprofile.php" class="btn btn-primary btn-md mt-4" style="color:white !important">PROFILE</a>

        <div class="row">

            <div class="col-md-12 mt-5">
                <div class="card text-center mb-4 mt-4" style="border:0px solid black">
                    <h2 class="mt-3">View Products</h2>
                </div>

                <div class="card-body">
                <?php 
                if(isset($_REQUEST['status'])){
            ?>
                <div class="alert alert-success">
                    <p>
						<?php 
							if(isset($_REQUEST['msg'])){
								echo $_REQUEST['msg'];
							}
						?>
                    </p>
                </div>
            <?php
                }
            ?>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Product Description</th>
                                    <th>Product Image</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                    <th>Action</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    include_once "fash/product.php";
                                    //create new obj
                                    $probj = new Product();
                                    $product = $probj->getUsersProducts($_SESSION['users_id']);

                                    if (count($product) > 0) {
                                        $kounter = 0;
                                        foreach ($product as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?php echo ++$kounter?></td>
                                        <td><?php echo $value['product_name']?></td>
                                        <td>&#8358;<?php echo number_format($value['product_price'], 2) ?></td>
                                        <td><?php echo $value['product_description']?></td>
                                        <td><img src="upload/<?php echo $value['img_url']?>" alt="product" class="img-fluid" style="width:60px"></td>
                                        <td><?php echo $value['category_name']?></td>
                                        <td>
                                            <a href="editproduct.php?productid=<?php echo $value['product_id']?>" class="btn btn-primary btn-sm" style="color:whitesmoke !important;">Edit</a>
                                        </td>
                                        <td> <a href="deleteproduct.php?productid=<?php echo $value['product_id']?>&productname=<?php echo $value['product_name']?>"  
                                        class="btn btn-danger btn-sm link" style="color:whitesmoke !important;">Delete</a></td>
                                    </tr>
                                <?php
                                        }
                                    }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>





<?php
    include_once "profooter.php";
?>