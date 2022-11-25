<?php
    if (isset($_REQUEST['btnCancel'])) {
        //redirect the user to allproducts.php
        header("Location: allproducts.php");
        exit();
    }

    if (isset($_REQUEST['btnDelete'])) {
        # add product class
        include_once "fash/product.php";
        //create an instance of class product

        $pro_obj = new Product();
        $output = $pro_obj->deleteProduct($_REQUEST['productid']);

        if ($output == true) {
            # deleted
            $status = "success";
            $msg = "Product was successfully deleted!";
        }else{
            $status = "failed";
            $msg = "Oops! Something went wrong";
        }
        //var_dump($output);
        //exit();
        //redirect to allproducts
        header("Location: allproducts.php?msg=$msg&status=$status");
        exit();
    }
?>