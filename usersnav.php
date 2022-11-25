<?php

    include_once "fash/constants.php";

    if (!isset($_SESSION['usertype']) || $_SESSION['usertype'] == 'user') {
?>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" language="javascript">
        
        $(document).ready(function(){
            $('#brand').hide();
        })

    </script>
<?php
    }else{
?>

    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" language="javascript">
        
        $(document).ready(function(){
            $('#user').hide();
        })

    </script>
<?php
    }

    //protect all users end pages
    if (isset($_SESSION['users_id'])) {
        # give access
    }else {
       header("Location: login.php");
        exit();
    }
?>
<style type="text/css">
    #nav,#nav1,#nav2,#nav3,#nav4,#nav5{
        text-decoration:none;
        color:black !important;
        font-size:18px;
    }
    ul{
        list-style-type:none;
    }
    #nav,#nav1,#nav2,#nav3,#nav4,#nav5:hover{
        color:black;
    }
    .item{
        margin:10px;
    }

</style>

<div class="container" id="user">
    <div class="row">
        <div class="col-md-12">

            <div class="card text-center mb-4 mt-5" style="border:0px solid black">
                <h2 class="mt-3">Personal Center</h2>
            </div>
               
                <div class="card-body">

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="userprofile.php" id="nav">
                            <i class="fa-sharp fa-solid fa-user"></i>    
                            <span class="item">Profile</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="edituserprofile.php?userid=<?php echo $_SESSION['users_id'] ?>" id="nav1">
                            <i class="fa-solid fa-user-pen"></i>    
                            <span class="item">Edit Profile</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#" id="nav3">
                            <i class="fa-solid fa-cart-shopping"></i>    
                            <span class="item">Wishlist</span></a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php" id="nav3">
                            <i class="fa-solid fa-right-from-bracket"></i>    
                            <span class="item">Logout</span></a>
                        </li>
                    </ul>
                </div>
           
        </div>
    </div>
</div>


<div class="container" id="brand">
    <div class="row">
        <div class="col-md-12">

            <div class="card text-center mb-4 mt-5" style="border:0px solid black">
                <h2 class="mt-3">Personal Center</h2>
            </div>
               
                <div class="card-body">

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="userprofile.php" id="nav">
                            <i class="fa-sharp fa-solid fa-user"></i>    
                            <span class="item">Profile</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="edituserprofile.php" id="nav1">
                            <i class="fa-solid fa-user-pen"></i>    
                            <span class="item">Edit Profile</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="addproduct.php" id="nav2">
                            <i class="fa-solid fa-file-circle-plus"></i>    
                            <span class="item">Add Product</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="allproducts.php" id="nav3">
                            <i class="fa-solid fa-list"></i>
                            <span class="item">View Products</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#" id="nav3">
                            <i class="fa-solid fa-cart-shopping"></i>    
                            <span class="item">Wishlist</span></a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php" id="nav3">
                            <i class="fa-solid fa-right-from-bracket"></i>    
                            <span class="item">Logout</span></a>
                        </li>
                    </ul>
                </div>
           
        </div>
    </div>
</div>










