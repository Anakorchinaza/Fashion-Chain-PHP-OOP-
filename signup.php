<?php
    $page_title = "Sign Up";
    include_once "header.php";
    include_once "fash/common.php";

    //create instance of class common
    $cobj = new Common();

    //check if the form has been submitted
    if (isset($_REQUEST['btnsignup'])) {
       //validate
       $validate = array();
       if(empty($_REQUEST['lastname'])){
        $validate['lastname'] = "Lastname Field is Required";
       }

       if(empty($_REQUEST['firstname'])){
        $validate['firstname'] = "Firstname Field is Required";
       }

       if(empty($_REQUEST['email'])){
        $validate['email'] = "Email Field is Required";
       }

       if(empty($_REQUEST['gender'])){
        $validate['gender'] = "Gender Field is Required";
       }

       if(empty($_REQUEST['usertype'])){
        $validate['usertype'] = "Usertype Field is Required";
       }

       if(empty($_REQUEST['phoneno'])){
        $validate['phoneno'] = "Phone Number Field is Required";
       }

       if(empty($_REQUEST['password'])){
        $validate['password'] = "Password Field is Required";
       }elseif (strlen($_REQUEST['password']) < 8) {
        $validate['password'] = "Password Must be more than 8 Characters";
       }

       //check if there is no validation error
       if (empty($validate)) {
            //sanitize inputs
            $lastname = $cobj->sanitizeInput($_REQUEST['lastname']);
            $firstname = $cobj->sanitizeInput($_REQUEST['firstname']);
            $password = $cobj->sanitizeInput($_REQUEST['password']);
            $email = $cobj->sanitizeInput($_REQUEST['email']);
            $phoneno = $cobj->sanitizeInput($_REQUEST['phoneno']);
            $gender = $_REQUEST['gender'];
            $brandname = $cobj->sanitizeInput($_REQUEST['brand_name']);
            $address = $cobj->sanitizeInput($_REQUEST['address']);
            $website = $cobj->sanitizeInput($_REQUEST['website']);
            $usertype = $_REQUEST['usertype'];

            # process the form data
            include_once "fash/myusers.php";
            
            //create object of users
            $users = new Users();
            //reference insertUsers

            $output = $users->insertUsers($lastname, $firstname, $password, $email, $phoneno, 
                    $gender, $brandname, $address, $website, $usertype);

            if ($output == 'success') { 
                //redirect to anoda page
                $msg = "success";
                header("Location: regstatus.php?msg=$msg");
                exit();
            }else {
                  $validate[] = $output;
            }
           
        
        }
    }
?>





<div class="container mt-5 w-50">

   
    <div class="card-header shadow text-center mb-4 mt-5">
        <h2 class="mt-3">CREATE AN ACCOUNT</h2>
    </div>

    <div class="card-body border-light mb-3 shadow mb-3">

        <form action="" method="post" Name="users signin">

            <div class="row mt-4 mb-5" id="user2">
                <div class="col-md-12 align-self-center">
                    <label for="lastname" class="form-label">Lastname<span style="color:red">*</span></label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php
                        if (isset($_REQUEST['lastname'])) {
                            echo $_REQUEST['lastname'];
                        }
                    ?>">
                    <?php
                        if(!empty( $validate['lastname'])){
                            echo "<div class='text-danger'>". $validate['lastname']."</div>";
                        }
                    ?>
                </div>   
            

            
                <div class="col-md-12">
                    <label for="firstname" class="form-label" >Firstname<span style="color:red">*</span></label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php 
                        if (isset($_REQUEST['firstname'])) {
                            echo $_REQUEST['firstname'];
                        }
                    ?>">
                    <?php
                        if(!empty( $validate['firstname'])){
                            echo "<div class='text-danger'>". $validate['firstname']."</div>";
                        }
                    ?>
                </div>   
            

            
                <div class="col-md-12">
                    <label for="email" class="form-label" >Email<span style="color:red">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php 
                        if (isset($_REQUEST['email'])) {
                            echo $_REQUEST['email'];
                        }
                    ?>">
                    <?php
                        if(!empty( $validate['email'])){
                            echo "<div class='text-danger'>". $validate['email']."</div>";
                        }
                    ?>
                </div>   
            

            
                <div class="col-md-12">
                    <label for="gender" class="form-label" >Gender<span style="color:red">*</span></label>
                    <input type="radio" id="male" name="gender" value="male">Male
                    <input type="radio" id="female" name="gender" value="female" checked>Female
                    <?php
                        if(!empty( $validate['gender'])){
                            echo "<div class='text-danger'>". $validate['gender']."</div>";
                        }
                    ?>
                </div>        
            
            
            
                <div class="col-md-12">
                    <label for="usertype" class="form-label" >User Type<span style="color:red">*</span></label>
                    <input type="radio" id="user" name="usertype" value="User" checked class="reg">User
                    <input type="radio" id="brand" name="usertype" value="Brand" class="reg">Brand
                    <?php
                        if(!empty( $validate['usertype'])){
                            echo "<div class='text-danger'>". $validate['usertype']."</div>";
                        }
                    ?>
                </div>        
            

            
                <div class="col-md-12">
                    <label for="phoneno" class="form-label" >Phone Number<span style="color:red">*</span></label>
                    <input type="textS" class="form-control" id="phoneno" name="phoneno" value="<?php 
                        if (isset($_REQUEST['phoneno'])) {
                            echo $_REQUEST['phoneno'];
                        }
                    ?>">
                    <?php
                        if(!empty( $validate['phoneno'])){
                            echo "<div class='text-danger'>". $validate['phoneno']."</div>";
                        }
                    ?>
                </div>   
            

            
                <div class="col-md-12">
                    <label for="password" class="form-label" >Password<span style="color:red">*</span></label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php 
                        if (isset($_REQUEST['password'])) {
                            echo $_REQUEST['password'];
                        }
                    ?>">
                    <?php
                        if(!empty( $validate['password'])){
                            echo "<div class='text-danger'>". $validate['password']."</div>";
                        }
                    ?>
                </div>   


                <div class="row mt-5">
                    <div class="col-md-12">
                        <button class="btn btn-outline-primary btn-lg mb-5" type="submit" name="btnsignup" style="box-shadow:2px 2px 6px grey" id="btn">Sign Up</button>
                    </div>
                </div>
            
            </div> 
        

            <div class="row mt-4 mb-5" id="brand2">                
                <div class="card-header shadow text-center mb-4 mt-5">
                    <h2 class="mt-3">BRANDS</h2>
                </div>

                <div class="col-md-12">
                    <label for="brand_name" class="form-label" >Brand Name</label>
                    <input type="text" class="form-control" id="brand_name" name="brand_name" value="<?php 
                        if (isset($_REQUEST['brand_name'])) {
                            echo $_REQUEST['brand_name'];
                        }
                    ?>">
                </div>   
                

                
                    <div class="col-md-12">
                        <label for="address" class="form-label" >Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php 
                            if (isset($_REQUEST['address'])) {
                                echo $_REQUEST['address'];
                            }
                        ?>">
                    </div>
                    <div id="desc" class="form-text">For easy location by Users in your locality</div>   
                

                
                    <div class="col-md-12">
                        <label for="website" class="form-label" >Website</label>
                        <input type="text" class="form-control" id="website" name="website" value="<?php 
                            if (isset($_REQUEST['website'])) {
                                echo $_REQUEST['website'];
                            }
                        ?>">
                    </div>   
                
                <div class="row mt-5">
                    <div class="col-md-12">
                        <button class="btn btn-outline-primary btn-lg mb-5" type="submit" name="btnsignup" style="box-shadow:2px 2px 6px grey">Sign Up</button>
                    </div>
                </div>
            </div>


            
        </form>
    
    </div>
    
            
</div>    

<script src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript">

  $(document).ready(function(){
    $('#brand2').hide()
    $('.reg').click(function(){
      if ($(this).val() == 'Brand') {
        $('#brand2').show();
        $('#btn').hide();
      }else{
        $('#brand2').hide();
        $('#btn').show();
      }
    })
  })

</script>

   
    <?php include_once "footer.php";?>
