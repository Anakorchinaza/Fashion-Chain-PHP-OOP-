<?php
$page_title = "Post profile";
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
        $msg = "Posted Successful";
        $status = "success";
        header("Location: post_index.php?msg=$msg&status=$status");
        exit();
    }else{
        $error[] = $post;
    }
 }
}



?>

<div class="container-fluid">
    <div class="row mt-1">
        <div class="col-md">
            <div>
                <img src="images/banner-1.jpg" alt="fashion" class="img-fluid">
                <h2 class="text-center fw-bold mt-5">Profile/Post</h2>
            </div>   

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
            
            <?php
                if (isset($_REQUEST['btnpost'])) {
                    foreach ($error as $key => $value) {
                        echo "<div class='alert alert-danger'>$value</div>";
                    }
                }
            ?>

        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-2">
                <div class="card" style="border:none">
                    <div class="card-body">
                        <div style="border-bottom:3px solid brown">
                            <img src="images/avatar.png" alt="image" height="50" width="70" style="border-radius:50px;">
                            <h4 class="mt-3" style="font-size:18px;"><?php 
                                if (isset($_SESSION['users_id'])) {
                                    echo $_SESSION['firstname']. " ". $_SESSION['lastname'];
                                }
                            ?></h4>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-7">

                <div class="card" style="border:none">
                    <!--main body-->
                    <div class="card-body">
                        
                        <div>
                            <form action="" method="post">
                                <input type="text" name="title" placeholder="Title" class="form-control" value="<?php 
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
                            include_once "fash/myusers.php";

                            if (isset($_SESSION['users_id'])) {
                                include_once "fash/post.php";

                                $obj = new Post();
                                $mypost = $obj->getUsersPost($_SESSION['users_id']);
                                    // echo "<pre>";
                                    // print_r($mypost);
                                    // echo "</pre>";
                                    // exit();

                                    if ($mypost) {
                                        foreach ($mypost as $key => $value) {
                        ?>
                            <div class="col-md-2"> 
                                <img src="images/avatar.png" alt="image" height="50" width="70" style="border-radius:50px;" class="mt-4">
                            </div>

                            <div class="col-md-9">
                                <a href="deletepost.php?postid=<?php echo $value['post_id'] ?>&title=<?php echo $value['title']?>" class="float-end text-danger mt-3">Delete</a>
                                <a href="edit_post_profile.php?postid=<?php echo $value['post_id'] ?>" class="me-3 float-end text-primary mt-3">Edit</a>
                                <h3 class="mt-4"><?php echo $value['firstname']. " ". $value['lastname'] ?></h3>
                                <p>Published a post on <?php echo date('D j F Y g:i A', strtotime($value['time_date'])) ?></p>
                                <hr>
                                <h3>
                                    <?php echo $value['title'] ?>
                                </h3>
                                <p>
                                    <?php echo $value['content'] ?>
                                </p>
                            
                                <a href="">20 Likes</a> &nbsp; &nbsp; 
                                <span style="font-size:20px;"><i class="fa-regular fa-comment"></i>&nbsp;4 comments</span> &nbsp; &nbsp; 
                                <span style="font-size:18px;"> <i class="fa-solid fa-share"></i>&nbsp;10 share</span>
                                <hr>

                                <span style="font-size:20px;">Like</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa-regular fa-comment"></i>
                                <span style="font-size:20px;">&nbsp;<a href="" style="color:black !important">comment</a></span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <i class="fa-solid fa-share"></i> <span style="font-size:20px;">Share</span>
                                

                            </div>

                            
                        <?php
                                }
                            }else{
                                echo "<div class='alert alert-success'>No Post</div>";
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