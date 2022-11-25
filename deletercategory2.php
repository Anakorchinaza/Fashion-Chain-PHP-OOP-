<?php
     if (isset($_REQUEST['btnCancel'])) {
        //redirect to allcategory.php
        header("Location: allcategory.php");
        exit();
    }

    if (isset($_REQUEST['btnDelete'])) {
        # add admin class
        include_once "fash/admin.php";
        //create an instance of class admin

        $obj = new Admin();
        $output = $obj->deleteCategory($_REQUEST['categoryid']);

        if ($output == true) {
            # deleted
            $status = "success";
            $msg = "Category was successfully deleted!";
        }else{
            $status = "failed";
            $msg = "Oops! Something went wrong";
        }
        //redirect to allcategory
        header("Location: allcategory.php?msg=$msg&status=$status");
        exit();
    }
?>