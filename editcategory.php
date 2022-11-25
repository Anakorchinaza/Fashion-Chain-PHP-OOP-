
<?php
     $page_title = "Edit Category";
     include_once "fash/admin.php";

     //create instance of category
     $obj = new Admin();
     
     if(isset($_REQUEST['categoryid'])){
        #make reference to getCategory method
        $category = $obj->getCategory($_REQUEST['categoryid']);

    }

     

    if (isset($_REQUEST['btnUpdate'])) {
        # validate
        $error = array();
        if (empty($_REQUEST['categoryname'])) {
            $error[] = "Category Name is required";
        }
        
           
            
         // file upload error
        
            
            if($_FILES['category_img']['error'] > 0){
                $error[] = "You've not uploaded any file or the file has been corrupted";
            }
        
            if ($_FILES['category_img']['size'] > 2097152) {
                $error[] = "File size cannot be more than 2mb";
            }


        

            //file type
            $ext_allowed = array("jpg","png","webp","gif","jpeg","svg");
            
            $filename_arr = explode(".",$_FILES['category_img']['name']);
            $filename_ext = end($filename_arr);
            if(!in_array(strtolower($filename_ext), $ext_allowed)){
                $errors[] = "File type not allowed";
            }
       
            
            $error[] = "You've not uploaded any file or the file has been corrupted";
       

        //process the form
        if (empty($error)) {

            # add category class 
            include_once "fash/admin.php";
            //create obj of admin
            $admin = new Admin();
            //reference addcategory
            $output = $admin->updateCategory($_REQUEST['categoryname'], $_FILES['category_img'], $_REQUEST['categoryid'] );
            
            if ($output == true) {
                # redirect
                $msg = 'success';
                header("Location: allcategory.php?msg=$msg");
                exit();
            }else {
                $error[] = $output;
            }
        }
    
    }
    
    include_once "proheaderadmin.php";
    
    
?>

<!--main content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <?php include_once "adminnav.php"; ?>
            </div>

            <div class="col-md-8">
                <div class="card text-center mb-4 mt-5" style="border:0px solid black">
                    <h2 class="mt-3">Edit Categories</h2>
                </div>

                <div class="card-body mb-5">
                    <?php
                        if(isset($_REQUEST['btnsubmit'])){
                            foreach ($error as $key => $value) {
                            echo "<div class='text-danger'>$value</div>";
                            }
                        }
                        ?>

                    <form action="" method="post" name="addcategory" enctype="multipart/form-data">
                        
                       <div class="col-md-12 mb-3">
                            <label for="categoryname" class="form-label">Category Name</label>
                            <input type="text" class="form-control" name="categoryname" value="<?php 
                                if(isset($category['category_name'])){
                                    echo $category['category_name'];
                                }

                            ?>">
                       </div>

                       <div class="col-md-12 mb-3">
                            <label for="category_img" class="form-label">Category Image</label>
                            <input type="file" class="form-control" name="category_img" value="">
                            
                            <label for="category_img" class="form-label">Current Image</label>
                            <img src="category/<?php  
                                if(isset($category['category_img'])){
                                    echo $category['category_img'];
                                }?>"
                                 alt="image" height="50px" width="50px">
                       </div>

                       <button class="btn btn-outline-primary btn-lg shadow mt-5" name="btnUpdate">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



<!--main content-->

<?php
    include_once "profooter.php";
?>