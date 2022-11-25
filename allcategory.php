<?php
    $page_title = "View All Category";
    include_once "proheaderadmin.php";
?>

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-3 mt-4">
                <?php include_once "adminnav.php" ?>
            </div>

            <div class="col-md-9 mt-5">
                <div class="card text-center mb-4 mt-4" style="border:0px solid black">
                    <h2 class="mt-3">View Category</h2>
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
                                    <th>Category Name</th>
                                    <th>Category Image</th>
                                    <th>Action</th>
                                    
                                    

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    include_once "fash/admin.php";
                                    //create new obj
                                    $obj = new Admin();
                                    $category = $obj->getAllCategory();

                                    if (count($category) > 0) {
                                        $kounter = 0;
                                        foreach ($category as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?php echo ++$kounter?></td>
                                        <td><?php echo $value['category_name']?></td>
                                        <td><img src="category/<?php echo $value['category_img']?>" alt="category" class="img-fluid" style="width:60px"></td>
                                        <td>
                                            <a href="editcategory.php?categoryid=<?php echo $value['category_id']?>" class="btn btn-primary btn-sm" style="color:whitesmoke !important;">Edit</a>
                                        
                                        <a href="deletecategory.php?categoryid=<?php echo $value['category_id']?>&categoryname=<?php echo $value['category_name']?>"  class="btn btn-danger btn-sm" style="color:whitesmoke !important;">Delete</a></td>
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