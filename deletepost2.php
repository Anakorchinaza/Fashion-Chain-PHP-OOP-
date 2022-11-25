<?php
    if (isset($_REQUEST['btnCancel'])) {
        # redirect to my posts
        header("Location: post_profile.php");
        exit();
    }

    if (isset($_REQUEST['btnDelete'])) {
        # include post class
        include_once "fash/post.php";

        $obj = new Post();
        $deletepost = $obj->deletePost($_REQUEST['postid']);

        if ($deletepost == true) {
            # delete
            $status = "success";
            $msg = "Post was Successfully deleted";
           
        }else{
            $status = "failed";
            $msg = "Oops! Something went wrong";
        }

        //redirect to post profile

        header("Location: post_profile.php?status=$status&msg=$msg"); 
        exit();
    }
?>