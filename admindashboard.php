<?php 
    $page_title = "Admin Dashboard";
    include_once "proheaderadmin.php"
?>
<!--main content-->
<div class="container-fluid">
    
    <div class="row mt-4">
        <div class="col-md-3">
            <?php include_once "adminnav.php" ?>
        </div>
       
        <div class="col-md-8">
         
            <div class="card text-center mb-4 mt-5" style="border:0px solid black">
                <h2 class="mt-3">Dashboard</h2>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card shadow" style="border-bottom:3px solid brown;">
                            <div class="card-header">
                                <i class="fa-solid fa-user-plus" style="font-size:30px;"></i>
                                <div class="text-end pt-1">
                                    <h4 class="text-sm mb-0 text-capitalize" >New Users</h4>
                                    <p class="mb-0">Total: 120K</p>
                                    <p class="mb-0">50% Increase</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow" style="border-bottom:3px solid brown;">
                            <div class="card-header">
                            <i class="fa-solid fa-arrow-trend-up" style="font-size:30px;"></i>
                                <div class="text-end pt-1">
                                    <h4 class="text-sm mb-0 text-capitalize" >Traffic</h4>
                                     <p class="mb-0">Total: 200K</p>
                                     <p class="mb-0">50% Increase</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow" style="border-bottom:3px solid brown;">
                            <div class="card-header">
                            <i class="fa-solid fa-chart-simple" style="font-size:30px;"></i>
                                <div class="text-end pt-1">
                                    <h4 class="text-sm mb-0 text-capitalize" >Performance</h4>
                                    <p class="mb-0">Total: 120K</p>
                                     <p class="mb-0">50% Increase</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow" style="border-bottom:3px solid brown;">
                            <div class="card-header">
                            <i class="fa-solid fa-location-arrow" style="font-size:30px;"></i>
                                <div class="text-end pt-1">
                                    <h4 class="text-sm mb-0 text-capitalize" >Visitors</h4>
                                     <p class="mb-0">Total:244K</p>
                                     <p class="mb-0">50% Increase</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    
        </div>

    </div>

</div>





<!--main content-->
<?php 
    include_once "profooter.php"
?>
