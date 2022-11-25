<?php 
 $page_title = "Delete product";
include_once "proheader.php";
// echo "<pre>";
// print_r($_REQUEST);
// echo "</pre>";

?>

<div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <?php include_once "usersnav.php"?>
            </div>

            <div class="col-md-8">
                <div class="card text-center mb-4 mt-5 shadows" style="border:0px solid black">
                    <h2 class="mt-3">Delete Product</h2>
                </div>

                <div class="card-body mb-5">
                    <?php
                        if(isset($_REQUEST['productid'])){
                            
                            echo "<div class='alert alert-warning'>
                                <h2>Are you sure you want to delete ".$_REQUEST['productname']." record?</h2>
                            </div>";
                        }
                    ?>
                    <form action="deleteproduct2.php" method="post">
                        <input type="hidden" name="productid" 
                        value="<?php if(isset($_REQUEST['productid'])){echo $_REQUEST['productid'];}?>">
                        <input type="submit" value="Delete" name="btnDelete" class="btn btn-danger shadow">
                        <input type="submit" value="Cancel" name="btnCancel" class="btn btn-secondary shadow">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php include_once "profooter.php"; ?>