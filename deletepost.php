<?php 
    $page_title = "Delete Post";
    include_once "proheader.php";
?>

<div class="container-fluid">
    <div class="row mt-1">
        <div class="col-md">
            <div>
                <img src="images/banner-1.jpg" alt="fashion" class="img-fluid">
                <h2 class="text-center fw-bold mt-5">Delete Post</h2>
            </div>  
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="card" style="border:none">
                    <div class="card-body">
                        <div style="border-bottom:3px solid brown">
                            <img src="images/avatar.png" alt="image" height="50" width="70" style="border-radius:50px;">
                            <h4 class="mt-3" style="font-size:18px;"><?php 
                                if (isset($_SESSION['users_id'])) {
                                    echo $_SESSION['firstname']. " ". $_SESSION['lastname'];
                                }
                            ?></h4>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-7">

                <div class="card" style="border:none">
                    <!--main body-->
                    <div class="card-body">
                        <div>
                            <?php
                                if (isset($_REQUEST['title'])) {
                                    echo "<div class='alert alert-warning'>
                                            <h3>Are you sure you want to Delete <br> '".
                                            $_REQUEST['title'].
                                            "' Record???</h3>
                                        </div>";
                                }
                            ?>

                            <form action="deletepost2.php" method="post">
                                <input type="hidden" name="postid" value="<?php 
                                    if (isset($_REQUEST['postid'])) {
                                        echo $_REQUEST['postid'];
                                    }
                                ?>"> 
                                <input type="submit" name="btnDelete" value="Delete" class="btn btn-danger btn-lg shadow">
                                <input type="submit" name="btnCancel" id="" value="Cancel" class="btn btn-secondary btn-lg shadow">
                            </form>
                        </div>
                    </div>
                      
                </div>
            </div>


            <div class="col-md-3">
                <div class="card" style="border:none">
                    <!--side bar-->
                    <div class="card-body">
                        <h4 class="mb-3 fw-bold text-center" style="border-bottom:2px solid brown;">Populars Brands</h4>

                        <div>
                            <img src="images/brand2.png" alt="brand" class="img-fluid shadow mb-5 mt-5">
                        </div>

                        <div>
                            <img src="images/brand1.png" alt="brand" class="img-fluid shadow mb-5 mt-5">
                        </div>

                        <div>
                            <img src="images/brand4.png" alt="brand" class="img-fluid shadow mb-5 mt-5">
                        </div>

                        <div>
                            <img src="images/brand3.png" alt="brand" class="img-fluid shadow mb-5 mt-5">
                        </div>

                        <div>
                            <img src="images/brand5.png" alt="brand" class="img-fluid shadow mb-5 mt-5 ">
                        </div>
                        <hr>
                        <div>
                            <h4 class="fw-bold">NOTICE</h4>
                            <p>This is a community which aims towards connecting Fashion Brands and Fashion Consumers together.
                                A world were variety of brands are at your disposal and  you can easily contact a brand closest to you.</p><hr> 
                                <p> A community where you can ask variety of questions relating to fashion which you always finds
                                diffcult and get instant feedbacks from the community. 
                            </p>

                        </div>
                        <hr>
                        <div>
                            <h4>Advertisements</h4>
                            <img src="images/apparel.jpg" alt="advert" class="img-fluid">
                        </div>
                            <hr>
                        <div>
                            <h6>A world of Discovery, Connectivity, shopping/Selling, Gaining Knowledge
                                    at your Finger Tips
                            </h6>
                            <p>
                                For Contribution, Reach Us at.........
                            </p>
                        </div>
                    </div>
                </div>
            </div>
                

        </div>
    </div>
</div>


<?php include_once "profooter.php" ?>