<?php
    $page_title = "Edit Profile";
    include_once "proheader.php";
    include_once "fash/common.php";
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

    //create instance of class common
    $cobj = new Common();

    //create instance of class myusers
    $user = new Users();

    //make reference to getprofile method
    if(isset($_SESSION['users_id'])){
        #make reference to getClub method
        $users = $user->getProfile2($_SESSION['users_id']);
    }

    //check if the form has been submitted
    if (isset($_REQUEST['btnupdate'])) {
       //validate
       $validate = array();
       if(empty($_REQUEST['lastname'])){
        $validate['lastname'] = "Lastname Field is Required";
       }

       if(empty($_REQUEST['firstname'])){
        $validate['firstname'] = "Firstname Field is Required";
       }

      

       if(empty($_REQUEST['phoneno'])){
        $validate['phoneno'] = "Phone Number Field is Required";
       }

    //    if(empty($_REQUEST['location'])){
    //     $validate['location'] = "Location Field is Required";
    //    }

       //check if there is no validation error
       if (empty($validate)) {
            //sanitize inputs
            $lastname = $cobj->sanitizeInput($_REQUEST['lastname']);
            $firstname = $cobj->sanitizeInput($_REQUEST['firstname']);
          
            $phoneno = $cobj->sanitizeInput($_REQUEST['phoneno']);
           
            $brandname = $cobj->sanitizeInput($_REQUEST['brand_name']);
            $address = $cobj->sanitizeInput($_REQUEST['address']);
            $website = $cobj->sanitizeInput($_REQUEST['website']);
            $usersid = $_SESSION['users_id'];
            

            # process the form data
            include_once "fash/myusers.php";
            
            //create object of users
            $users = new Users();
            //reference insertUsers

            $output = $users->updateUsers($lastname, $firstname, $phoneno, 
                     $brandname, $address, $website, $usersid);

           

            if ($output == 'success' || $output == "No update made") { 
                //redirect to anoda page
                $msg = "success";
                header("Location: userprofile.php?msg=$msg");
                exit();
            }else {
                  $validate[] = $output;
            }
           
        
        }
    }
?>



<!--page content-->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <?php include_once "usersnav.php" ?>
        </div>
        <div class="col-md-6">
            <div class="card text-center mb-4 mt-5" style="border:0px solid black">
                <h2 class="mt-3">Edit Profile</h2>
            </div>

            <div class="card-body mb-5">
                <?php
                    if(isset($_REQUEST['btnupdate'])){
                        foreach ($validate as $key => $value) {
                            echo "<div class='text-danger'>$value</div>";
                        }
                    }
                ?>
                <form action="edituserprofile.php?userid=<?php 
                    if (isset($_SESSION['users_id'])) {
                       echo $_SESSION['users_id'];
                    }
                ?>" method="post" name="editprofile">
                   
                    
                    <div class="mb-3">
                        <label for="productname" class="form-label">Lastname</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="<?php 
                            if (isset($users['lastname'])) {
                                echo $users['lastname'];
                            }
                        ?>">
                    </div>

                    <div class="mb-3">
                        <label for="productprice" class="form-label">Firstname</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" value="<?php 
                            if (isset($users['firstname'])) {
                                echo $users['firstname'];
                            }
                        ?>">
                    </div>


                    <div class="mb-3">
                        <label for="productprice" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phoneno" name="phoneno" value="<?php 
                            if (isset($users['phoneno'])) {
                                echo $users['phoneno'];
                            }

                        ?>">
                    </div>


                    <div class="mb-3 brand">
                        <label for="productprice" class="form-label">Brand Name</label>
                        <input type="text" class="form-control" id="brand_name" name="brand_name" value="<?php 
                            if (isset($users['brand_name'])) {
                                echo $users['brand_name'];
                            }
                        ?>">
                    </div>


                    <div class="mb-3 brand">
                        <label for="productprice" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php 
                            if (isset($users['address'])) {
                                echo $users['address'];
                            }
                           
                        ?>">
                    </div>


                    <div class="mb-3 brand">
                        <label for="productprice" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location" value="<?php 
                            if (isset($users['location'])) {
                                echo $users['location'];
                            }
                            
                        ?>">
                         <div id="desc" class="form-text">Please include Country, State and City</div>
                    </div>


                    <div class="mb-3 brand">
                        <label for="productprice" class="form-label">Website</label>
                        <input type="text" class="form-control" id="website" name="website" value="<?php 
                            if (isset($users['website'])) {
                                echo $users['website'];
                            }
                           
                        ?>">
                    </div>
                    
                    <button type="submit" class="btn btn-outline-primary mt-3" name="btnupdate">Update</button>
                </form>
            </div>
        </div>
    </div>

</div>
<!--page content-->

    <?php include_once "footer.php";?>
