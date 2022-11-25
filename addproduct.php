<?php

    $page_title = "Add product";
    include_once "proheader.php";

    include_once "fash/common.php";
    include_once "fash/admin.php";
    include_once "fash/myusers.php";

    if (!isset($_SESSION['usertype']) || $_SESSION['usertype'] == 'user') {
       
        $msgs = "You don't have access to this page";
        //redirect to login page
        header("Location: userprofile.php?msgs=$msgs");
        exit();
    }



    //add class obj
    $catobj = new Admin();
    $categories = $catobj->getALLcategory();
    

    //create instance of class common
    $com = new Common();

    //check if the form was submitted
    if (isset($_REQUEST['btnaddproduct'])) {
        $error = array();
        if (empty($_REQUEST['productname'])) {
            $error[] = "Product Name is required";
        }
        if (empty($_REQUEST['productprice'])) {
            $error[] = "Product Price is required";
        }
        if (empty($_REQUEST['productdesc'])) {
            $error[] = "Product Description is required";
        }
        //file upload error

       if (isset($_FILES)) {
            if ($_FILES['productimg']['error'] > 0) {
                $error[] = "You've not uploaded any file or the file has been corrupted";
            }
            if ($_FILES['productimg']['size'] > 2097152) {
                $error[] = "File size cannot be more than 2mb";
            }

            //file type
            $ext_allowed = array("jpg","png","webp","gif","jpeg","svg");
            //var_dump($ext_allowed);
           
            $filename_arr = explode(".", $_FILES['productimg']['name']);
            $filename_ext = end($filename_arr);
            //var_dump($filename_ext,  $_FILES['productimg']['name']);
            //exit;
            if (!in_array(strtolower($filename_ext), $ext_allowed)) {
                $error[] = "File type not allowed";
            }
        }else {
            $error[] = "You've not uploaded any file or the file has been corrupted";
        }

        //process the form data

        if (empty($error)) {
            # sanitizeinputs
            $productname = $com->sanitizeInput($_REQUEST['productname']);
            $productprice = $com->sanitizeInput($_REQUEST['productprice']);
            $productdesc = $com->sanitizeInput($_REQUEST['productdesc']);
            $usersid = $_SESSION['users_id'];
            $category = $_REQUEST['category'];
           

            //add product class
            include_once "fash/product.php";
            $productobj = new Product();
            //reference addproduct method 
            $output = $productobj->addProduct($productname, $category, $productprice, $productdesc, $usersid);

            if ($output == "success") {
                //redirect to allproduct.php
                $msg = "success";
                header("Location: allproducts.php?msg=$msg");
                exit();
            }else {
                $error[] = $output;
            }
        }
    }

   
?>
 
 <!--page content-->
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-3">
            <?php include_once "usersnav.php" ?>
        </div>
        <div class="col-md-9">
            <div class="card text-center mb-4 mt-5 shadows" style="border:0px solid black">
                <h2 class="mt-3">Add Product</h2>
            </div>

            <div class="card-body mb-5">
                <?php
                    if(isset($_REQUEST['btnaddproduct'])){
                        foreach ($error as $key => $value) {
                            echo "<div class='text-danger'>$value</div>";
                        }
                    }
                ?>
                <form action="" method="post" name="addproduct" enctype="multipart/form-data">
                   
                    <select class="form-select mb-3" name="category">
                        <option value="">Select Category</option>
                        <?php
                           
                             foreach ($categories as $key => $value) {
                                $categoryid = $value['category_id'];
                                $categoryname = $value['category_name'];

                                if (isset($_REQUEST['category']) && $_REQUEST['category'] == $categoryid) {
                                    echo "<option value='$categoryid' selected>$categoryname</option>";
                                }else{
                                    echo "<option value='$categoryid'>$categoryname</option>";
                                }
                            }


                        ?>
                        
                    </select>
                    
                    <div class="mb-3">
                        <label for="productname" class="form-label">Product name</label>
                        <input type="text" class="form-control" id="productname" placeholder="Enter product name" name="productname" value="<?php 
                            if (isset($_REQUEST['productname'])) {
                                echo $_REQUEST['productname'];
                            }
                        ?>">
                    </div>

                    <div class="mb-3">
                        <label for="productprice" class="form-label">Product Price</label>
                        <input type="text" class="form-control" placeholder="12000" id="productprice" name="productprice" value="<?php 
                            if (isset($_REQUEST['productprice'])) {
                                echo $_REQUEST['productprice'];
                            }
                        ?>"if>
                    </div>

                    <div class="mb-3">
                        <label for="productimg" class="form-label">Upload image</label>
                        <input type="file" class="form-control" id="productimg" name="productimg">
                    </div>

                    <div class="mb-3">
                        <label for="productdesc" class="form-label">Product Description</label>
                        <textarea rows="3" class="form-control" id="productdesc" name="productdesc"><?php 
                            if (isset($_REQUEST['productdesc'])) {
                                echo $_REQUEST['productdesc'];
                            }
                        ?></textarea>
                        <div id="desc" class="form-text">Please include Available sizes and color</div>
                        
                    </div>

                    <button type="submit" class="btn btn-outline-primary mt-3" name="btnaddproduct">Add Product</button>
                </form>
            </div>
        </div>
    </div>

</div>
<!--page content-->

<?php
    include_once "profooter.php";
?>