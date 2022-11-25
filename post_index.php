<?php
$page_title = "Post Feed";
include_once "proheader.php"; 
include_once "fash/common.php";

//add class common
$com = new Common();

//check if thepost button was submitted

if (isset($_REQUEST['btnpost'])) {
 $error = array();
 if (empty($_REQUEST['title'])) {
    $error[] = "Title is Required";
 }

 if (empty($_REQUEST['content'])) {
    $error[] = "Content is Required";
 }

 // process the post
 if (empty($error)) {
    # sanitize
    $title = $com->sanitizeInput($_REQUEST['title']);
    $content = $com->sanitizeInput($_REQUEST['content']);
    $userid = $_SESSION['users_id'];

    //add class post
    include_once "fash/post.php";

    $obj = new Post();
    $post = $obj->addPost($title, $content, $userid);

    if ($post == 'success') {
      
        //redirect
        $msg = "success";
        header("Location: post_index.php?msg=$msg");
        exit();
    }else{
        $error[] = $post;
    }
 }

}


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
    //$postid = $_REQUEST['postid'];
    $userid = $_SESSION['users_id'];
    //add class
    include_once "fash/comments.php";
    $obj3 = new Comments();
    // echo "<pre>";
    // print_r($_REQUEST);
    // echo "</pre>";

    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
    
    $comments = $obj3->addComments($_REQUEST['postid'], $content, $userid);
    // echo "<pre>";
    // print_r($_REQUEST['postid']);
    // echo "</pre>";
    

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

    <div class="container-fluid">
        <div class="row mt-1">
            <div class="col-md">
                <div >
                    <img src="images/bg-8.jpg" alt="fashion" class="img-fluid">
                    <h2 class="text-center fw-bold mt-5">Community/Activity</h2>
                </div>   
                
                <?php
                    if (isset($_REQUEST['btnpost'])) {
                        foreach ($error as $key => $value) {
                            echo "<div class='alert alert-danger'>$value</div>";
                        }
                    }

                    if (isset($_REQUEST['btncomment'])) {
                        foreach ($error as $key => $value) {
                            echo "<div class='alert alert-danger'>$value</div>";
                        }
                    }
                ?>
            </div>
        </div>

       <div class="container">
            <div class="row">
                <div class="col-md-9">

                    <div class="card" style="border:none">
                        <!--main body-->
                        <div class="card-body">
                            <h4>All Members: 60,000</h4>

                            <div class="float mb-4 mt-4">
                            <img src="images/avatar.png" alt="image" height="50" width="70" style="border-radius:50px;">
                                <span class="mt-3" style="font-size:20px;"><?php 
                                    if (isset($_SESSION['users_id'])) {
                                        echo  $_SESSION['firstname']. " ". $_SESSION['lastname'];
                                    }
                                ?></span>

                                <?php 
                                    if(isset($_REQUEST['status'])){
                                ?>  
                                    <div class="col-md-6 alert alert-success">
                                        <p>
                                            <?php 
                                                if(isset($_REQUEST['msg'])){
                                                    echo $_REQUEST['msg'];
                                                }
                                            ?>
                                        </p>
                                    </div>
                                <?php
                                    }
                                ?>
                            </div>

                            <div>
                                <form action="" method="Post">
                                    <input type="text" name="title" class="form-control" placeholder="Title" value="<?php 
                                        if (isset($_REQUEST['title'])) {
                                            echo $_REQUEST['title'];
                                        }
                                    ?>">
                                    <textarea name="content" id="" cols="50" rows="3" placeholder="What's on your mind?" 
                                    class="form-control mt-3"><?php 
                                        if (isset($_REQUEST['content'])) {
                                            echo $_REQUEST['content'];
                                        }
                                    ?></textarea>
                                    <button type="submit" name="btnpost" class="btn btn-primary mt-3 float-end">Post</button>
                                    <br><br><hr>
                                </form>
                            </div>
                            

                            <div class="row bg-light mt-4">

                                <?php
                                    //add post class
                                    include_once "fash/post.php";
                                    $obj = new Post();
                                    $viewpost = $obj->getAllPost();

                                    // echo "<pre>";
                                    // print_r($viewpost);
                                    // echo "</pre>";
                                    // exit;
                                   
                                    

                                    if ($viewpost) {
                                        foreach ($viewpost as $key => $value){ 
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
                                           
                                          
                                         <?php echo date('D j F Y g:i A', strtotime($value['time_date'])) ?></p>
                                        <hr>
                                        <h3>
                                            <?php echo $value['title'] ?>
                                        </h3>
                                        <p>
                                            <?php echo $value['content'] ?>
                                        </p>
                                        
                                        
                                        <a href="">20 Likes</a> &nbsp; &nbsp; 
                                        
                                        <span style="font-size:20px;"><i class="fa-regular fa-comment"></i>&nbsp; <a href="getcomments.php?postid=<?php echo $value['post_id'] ?>"> 
                                        
                                       comments</a></span> &nbsp; &nbsp; 
                                        
                                      
                                        <span style="font-size:18px;"> <i class="fa-solid fa-share"></i>&nbsp;10 share</span>


                                        <form action="post_index.php?postid=<?php echo $value['post_id'] ?>" method="post">
                                           
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

                            <button type="submit" name="" class="btn btn-primary mt-3 float-end">See More Posts</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card" style="border:none">
                        <!--side bar-->
                        <div class="card-body">
                            <h4 class="mb-3 fw-bold text-center" style="border-bottom:2px solid brown;">Populars Brands</h4>

                            <div>
                                <img src="images/brand2.png" alt="brand" class="img-fluid shadow mb-5 mt-5">
                            </div>

                            <div>
                                <img src="images/brand1.png" alt="brand" class="img-fluid shadow mb-5 mt-5">
                            </div>

                            <div>
                                <img src="images/brand4.png" alt="brand" class="img-fluid shadow mb-5 mt-5">
                            </div>

                            <div>
                                <img src="images/brand3.png" alt="brand" class="img-fluid shadow mb-5 mt-5">
                            </div>

                            <div>
                                <img src="images/brand5.png" alt="brand" class="img-fluid shadow mb-5 mt-5 ">
                            </div>
                            <hr>
                            <div>
                                <h4 class="fw-bold">NOTICE</h4>
                                <p>This is a community which aims towards connecting Fashion Brands and Fashion Consumers together.
                                    A world were variety of brands are at your disposal and  you can easily contact a brand closest to you.</p><hr> 
                                   <p> A community where you can ask variety of questions relating to fashion which you always finds
                                    diffcult and get instant feedbacks from the community. 
                                </p>

                            </div>
                            <hr>
                            <div>
                                <h4>Advertisements</h4>
                                <img src="images/apparel.jpg" alt="advert" class="img-fluid">
                            </div>
                                <hr>
                            <div>
                                <h6>A world of Discovery, Connectivity, shopping/Selling, Gaining Knowledge
                                     at your Finger Tips
                                </h6>
                                <p>
                                    For Contribution, Reach Us at.........
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>

<?php include_once "profooter.php" ?>