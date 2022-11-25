<?php  
     $page_title = "Approve product";
     include_once "proheaderadmin.php";
?>




    <div class="container-fluid">
    <a href="admindashboard.php" class="btn btn-primary btn-md mt-4" style="color:white !important">Dashboard</a>
        <div class="row">
            
            <div class="col-md-12 mt-5">
                <div class="card text-center mb-4 mt-4" style="border:0px solid black">
                    <h2 class="mt-4">Authorize Products</h2>
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
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Product Description</th>
                                    <th>Product Image</th>
                                    <th>Category</th>
                                    <th>Brand Name</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    include_once "fash/admin.php";
                                    $obj = new Admin();
                                    $approve = $obj->approveProduct();

                                    if (count($approve) > 0) {
                                        $kounter = 0;
                                        foreach ($approve as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?php echo ++$kounter ?></td>
                                        <td><?php echo $value['product_name'] ?></td>
                                        <td>&#8358;<?php echo number_format($value['product_price'], 2) ?></td>
                                        <td><?php echo $value['product_description'] ?></td>
                                        <td><img src="upload/<?php echo $value['img_url']  ?>" alt="product image" class="img-fluid"></td>
                                        <td><?php echo $value['category_name'] ?></td>
                                        <td><?php echo $value['brand_name'] ?></td>
                                        <td>
                                                <?php
                                                    $productid = $value['product_id'];

                                                    $status = $value['status']; 

                                                    if ($value['status'] == 1) {
                                                        echo "<a href='status.php?productid=$productid&status=$status' class='btn btn-success btn-sm' style='color:white !important'>Active</a>";
                                                    }else if ($value['status'] == 0){
                                                        echo "<a href='status.php?productid=$productid&status=$status' class='btn btn-danger btn-sm' style='color:white !important'>Inactive</a>";
                                                    }
                                                ?>
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-danger btn-sm" style="color:white !important">Delete</a>
                                        </td>


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
    

<?php include_once "profooter.php" ?>