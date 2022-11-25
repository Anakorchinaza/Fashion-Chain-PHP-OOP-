<?php
    //protect all users end pages
    if (isset($_SESSION['admin_id'])) {
        # give access
    }else {
        header("Location: adminlogin.php");
        exit();
    }
?>

<style type="text/css">
    #nav,#nav1,#nav2,#nav3,#nav4,#nav5{
        text-decoration:none;
        color:black;
        font-size:18px;
    }
    ul{
        list-style-type:none;
    }
    #nav,#nav1,#nav2,#nav3,#nav4,#nav5:hover{
        color:black !important;
    }
    .item{
        margin:10px;
    }

</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card text-center mb-4 mt-5" style="border:0px solid black">
                <h2 class="mt-3">Admin</h2>
            </div>
               
    
                <div class="card-body">

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="admindashboard.php" id="nav">
                            <i class="fa-solid fa-users"></i>
                            <span class="item">Dashboard</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="allusers.php" id="nav1">
                            <i class="fa-solid fa-users"></i>
                            <span class="item">View Users</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="allbrands.php" id="nav2">
                            <i class="fa-solid fa-list"></i> 
                            <span class="item">View Brands</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="approveproduct.php" id="nav3">
                            <i class="fa-solid fa-check-to-slot"></i>
                            <span class="item">Authorize</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="addcategory.php" id="nav3">
                            <i class="fa-solid fa-plus"></i>   
                            <span class="item">Add Category</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="allcategory.php" id="nav3">
                            <i class="fa-solid fa-list"></i>   
                            <span class="item">All Category</span></a>
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
