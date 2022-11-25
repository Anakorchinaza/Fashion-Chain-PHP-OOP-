<?php
     $page_title = "AdminLogin";
     include_once "header.php";
    //check if the submit button was clicked
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //validate form
        $validate = array();
       if(empty($_REQUEST['admin_email'])){
        $validate[] = "Email Field is Required";
       }

       if(empty($_REQUEST['admin_password'])){
        $validate[] = "Password Field is Required";
       }
       //if no validation error, then process login
       
       if (empty($validate)) {
    //ob_start();
        include_once "fash/admin.php";

        $user = new Admin();

        $output = $user->adminLogin($_REQUEST['admin_email'], $_REQUEST['admin_password']);
        
        if ($output == false) {
           $validate[] = "Invalid Email or Password";
        }else {
            header("Location: admindashboard.php");
            exit();
        }
       }
    }
    //ob_end_flush();
?>

<div class="container mt-5 mb-4" style="box-shadow:2px 2px 3px grey;
    background-color:beige;">

    <h2 style="text-align:center; padding:10px; text-shadow:2px 2px 6px grey" class="mt-5">ADMIN LOGIN</h2>
    <?php

        //var_dump($validate);  
		
        if (isset($validate)) {
				echo "<ul>";
           foreach ($validate as $key => $value) {
            echo "<li class='text-danger'>$value</li>";
           }
				echo "</ul>";
        }

    ?>

    <form action="" method="post" name="admin login" style="text-align:center;
        ">
        <?php  
            if (isset($_REQUEST['msg'])) {
                $msg = $_REQUEST['msg'];
                echo "<div class='text-danger'>$msg</div>";
            }
        ?>

        <div class="row mt-4 mb-4">
            <div class="col-md-7">
                <label for="email" class="form-label">Email</label>
            </div>
            <div class="col-md-5 offset-md-3">
                <input type="email" class="form-control" id="email" name="admin_email">
            </div>   
        </div>

        <div class="row mt-4">
            <div class="col-md-7">
                <label for="password" class="form-label" >Password</label>
            </div>
            <div class="col-md-5 offset-md-3">
                <input type="password" class="form-control" id="password" name="admin_password">
            </div>   
        </div>

        <div class="row mt-3 mb-3">
            <div class="col-md-12 mb-5">
                <button class="btn btn-outline-primary btn-lg" type="submit" name="btnlogin" 
                style="box-shadow:3px 4px 6px grey">Login</button>
            </div>
        </div>
    </form>
            
</div>

<?php
    include_once "footer.php";
?>