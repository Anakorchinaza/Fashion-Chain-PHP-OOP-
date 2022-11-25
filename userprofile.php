<?php
    $page_title = "Profile";
    include_once "proheader.php";
    include_once "fash/myusers.php";

    if (!isset($_SESSION['usertype']) || $_SESSION['usertype'] == 'user') {
       
?>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" language="javascript">
        
        $(document).ready(function(){
            $('.brand').hide();
        })

    </script>


<?php
    }

    //create instance of category
    $obj = new Users();
       #make reference to getCategory method
    $profile = $obj->getProfile2($_SESSION['users_id']);

?>

<!-- page content -->

<div class="container">
    
    <div class="row mt-4">
        <div class="col-md-4">
            <?php include_once "usersnav.php" ?>
        </div>
        
        <div class="col-md-8 ">
    
            <div class="card text-center mb-4 mt-5" style="border:0px solid black">
                <h2 class="mt-3">My Profile</h2>
            </div>

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

            <div class="card-body">

            <?php  
            if (isset($_REQUEST['msgs'])) {
                $msgs = $_REQUEST['msgs'];
                echo "<div class='alert alert-danger'>$msgs</div>";
            }
             ?>

                <?php
                    if(isset($_SESSION['users_id'])){
                    echo "<h4>Welcome ".$_SESSION['firstname']." ".$_SESSION['lastname']. "</h4>";
                    }
                ?>

                <table cellpadding="4" cellspacing="0">
                 
                
                    <tr>
                        <td><b>Lastname:</b></td>
                        <td><?php 
                           echo $profile['lastname']    
                        ?></td>
                    </tr>

                    <tr>
                        <td><b>Firstname:</b></td>
                        <td>
                            <?php 
                                 echo $profile['firstname']   
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td><b>Gender:</b></td>
                        <td>
                        <?php 
                            echo $profile['gender'] 
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td><b>Phone Number:</b></td>
                        <td> 
                        <?php 
                            echo $profile['phoneno'] 
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td><b>Email:</b></td>
                        <td>
                        <?php 
                            echo $profile['email'] 
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td><b>usertype:</b></td>
                        <td>
                        <?php 
                            echo $profile['usertype'] 
                            ?>
                        </td>
                    </tr>

                    <tr class="brand">
                        <td><b>Brand Name:</b></td>
                        <td>
                        <?php 
                            echo $profile['brand_name'] 
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td class="brand"><b>Address:</b></td>
                        <td>
                        <?php 
                            echo $profile['address'] 
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td class="brand"><b>Website:</b></td>
                        <td>
                        <?php 
                            echo $profile['website'] 
                            ?>
                        </td>
                    </tr>

                </table>

              

               


            </div>

        </div>

    </div>

</div>

<!-- page content -->
<?php
    include_once "profooter.php";
?>