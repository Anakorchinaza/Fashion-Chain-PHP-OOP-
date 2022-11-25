<?php
    $page_title = "Comments";
    include_once "proheader.php"; 
    include_once "fash/common.php";

    //add class common
    $com = new Common();

    //add getcomment class
    include_once "fash/comments.php";

    //for comment

if (isset($_REQUEST['btncomment'])) {
    $error = array();
 if (empty($_REQUEST['comment'])) {
    $error[] = "Comment is Required";
 }
 //process
 if (empty($error)) {
    # sanitize
    $content = $com->sanitizeInput($_REQUEST['comment']);
    $postid = $_REQUEST['postid'];
    $userid = $_SESSION['users_id'];
    //add class
    include_once "fash/comments.php";
    $obj3 = new Comments();
   
    
    $comments = $obj3->addComments($postid, $content, $userid);

    if ($comments == 'success') {
        # redirect
        $msg = 'success';
        header("Location: post_index.php?msg=$msg");
        exit();
    }else{
        $error[] = $comments;
    }
 }
}

?>

<div class="container mt-5 mb-5">
    <div class="row bg-light">

   
        <?php

            //add class post
            include_once "fash/post.php";

            $obj = new Post();
            $post = $obj->getPost($_REQUEST['postid']);
            // echo "<pre>";
            // print_r($post);
            // echo "</pre>";
            

           

            if ($post) { 
                foreach ($post as $key => $value) {
        ?>

            <div class="col-md-2"> 
                <img src="images/avatar.png" alt="image" height="50" width="70" style="border-radius:50px;" class="mt-4">
            </div>

                <input type="hidden" name="postid" value="<?php echo $value['post_id'] ?>">
          
            <div class="col-md-9">
                
                <h3 class="mt-4"><?php 
                    echo $value['firstname']. " ". $value['lastname']
                ?></h3>
                <p>Published a post on     
                    <?php echo date('D j F Y g:i A', strtotime($value['time_date'])) ?>
                </p>
                <hr>
                <h3>
                    <?php echo $value['title'] ?>
                </h3>
                <p>
                    <?php echo $value['content'] ?>
                </p>
                
                
                <a href="">20 Likes</a> &nbsp; &nbsp; 
                
                <span style="font-size:20px;"><i class="fa-regular fa-comment"></i>&nbsp; <a href=""> 4 comments</a></span> &nbsp; &nbsp; 
                
                <span style="font-size:18px;"> <i class="fa-solid fa-share"></i>&nbsp;10 share</span>

                <form action="getcomments.php?postid=<?php echo $value['post_id'] ?>" method="post">
                                                
                    <input type="text" name="comment" id="" placeholder="Post a comment" class="form-control mb-4" value="<?php 
                    if (isset($_REQUEST['comment'])) {
                        echo $_REQUEST['comment'];
                    }
                    ?>">
                    <button type="submit" name="btncomment" class="btn btn-primary btn-sm mb-3 float-end">Comment</button>
                </form>
            </div>

        <?php
                }
            }

        ?>

    </div>





    <?php
        
        $obj = new Comments();
    
        $comments = $obj->getAllComments($_REQUEST['postid']);
        // echo "<pre>";
        // print_r($comments);
        // echo "</pre>";
        

        if ($comments) {
            foreach ($comments as $key => $value) {
    ?>
        <div class="container mt-0">
            <div class="row bg-light">
                <div class="col-md-2"> 
                    <img src="images/avatar.png" alt="image" height="50" width="70" style="border-radius:50px;" class="mt-4">
                </div>    
                <input type="hidden" name="postid" value="<?php echo $value['post_id'] ?>">

                <div class="col-md-7 me-5">

                    <a href="deletecomment.php?commentid=<?php echo $value['comment_id'] ?>&content=<?php echo $value['content']?>" class="float-end text-danger mt-3">Delete</a>
                    <a href="editcomment.php?commentid=<?php echo $value['comment_id'] ?>" class="me-3 float-end text-primary mt-3">Edit</a>                        
                    <h5 class="mt-4"><?php 
                        echo $value['firstname']. " ". $value['lastname'];
                    ?></h5>
                        
                    <p>
                        <?php echo $value['content'] ?>
                    </p>
                    </div>

                </div>

            </div>  
        </div>   
                
    <?php
        
            }
        }
    ?>
    <a href="post_index.php" class="btn btn-primary btn-sm me-3" style="color:white !important">Back to Posts</a>
</div>

<?php include_once "profooter.php" ?>