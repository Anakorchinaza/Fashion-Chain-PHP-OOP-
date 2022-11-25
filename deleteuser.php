<?php
  if (isset($_REQUEST['cancel'])) {
    //redirect to allusers.php
    header("Location: allusers.php");
    exit();
  }  

  if (isset($_REQUEST['delete'])) {
    //add admin class
    include_once "fash/admin.php";
    //create new class
    $obj = new Admin();
    //instantiate obj of class
    
    $output = $obj->deleteUsers($_REQUEST['usersid']);

    if ($output == true) {
        //delete
        $status = 'success';
        $msg = 'User was successfully deleted!';
    }else{
      $status = "failed";
      $msg = "Oops! Something went wrong";
    }
        //redirect to alluser.php
        header("Location: allusers.php?msg=$msg&status$status");
        exit();
    


    
  }

?>