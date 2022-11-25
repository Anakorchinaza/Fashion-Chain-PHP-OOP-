<?php
     $page_title = "Delete Category";
    include_once "proheaderadmin.php";
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <?php include_once "adminnav.php"?>
            </div>

            <div class="col-md-8">
                <div class="card text-center mb-4 mt-5 shadows" style="border:0px solid black">
                    <h2 class="mt-3">Delete Category</h2>
                </div>

                <div class="card-body mb-5">
                    <?php
                        if(isset($_REQUEST['categoryname'])){
                            echo "<div class='alert alert-warning'>
                                <h2>Are you sure you want to delete ".$_REQUEST['categoryname']." record?</h2>
                            </div>";
                        }
                    ?>
                    <form action="deletercategory2.php" method="post">
                        <input type="hidden" name="categoryid" 
                        value="<?php if(isset($_REQUEST['categoryid'])){echo $_REQUEST['categoryid'];}?>">
                        
                        <input type="submit" value="Delete" name="btnDelete" class="btn btn-danger shadow">
                        <input type="submit" value="Cancel" name="btnCancel" class="btn btn-secondary shadow">
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
    include_once "profooter.php";
?>