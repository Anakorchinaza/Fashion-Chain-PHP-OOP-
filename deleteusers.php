<?php
    $page_title = "delete User";
    include_once "proheaderadmin.php" 
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <?php include_once "adminnav.php" ?>
            </div>

            <div class="col-md-8">
                <div class="card text-center mb-4 mt-5 shadows" style="border:0px solid black">
                    <h2 class="mt-3">Delete User</h2>
                </div>

                <div class="card-body mb-5">
                    <?php 
                        if (isset($_REQUEST['usersname'])) {
                          echo "<div class='alert alert-warning'>
                                    <h2>Are You Sure you want to delete " . $_REQUEST['usersname']. " Record?</h2>
                                </div>";
                        }
                    ?>

                    <form action="deleteuser.php" method="post">
                        <input type="hidden" name="usersid" value="<?php 
                            if (isset($_REQUEST['usersid'])) {
                                echo $_REQUEST['usersid'];
                            }
                        ?>">

                        <button type="submit" name="delete" class="btn btn-danger shadow">Delete</button>
                        <button type="submit" name="cancel" class="btn btn-info shadow">Cancel</button>

                    </form>
                </div>

            </div>
        </div>
    </div>




<?php include_once "profooter.php" ?>