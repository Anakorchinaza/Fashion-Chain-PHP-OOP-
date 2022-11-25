<?php 
     $page_title = "View All Users";
    include_once "proheaderadmin.php";
?>


    <div class="container-fluid">

        <div class="row">
            <div class="col-md-3 mt-4">
                <?php include_once "adminnav.php" ?>
            </div>

            <div class="col-md-9 mt-5">
                <div class="card text-center mb-4 mt-4" style="border:0px solid black">
                    <h2 class="mt-3">View All Users</h2>
                </div>

                <div class="card-body">
            <?php 
                if(isset($_REQUEST['status'])){
            ?>
                <div class="alert alert-success">
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
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <td>#</td>
                                <th>Lastname</th>
                                <th>Firstname</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Gender</th>
                                <th>usertype</th>
                                <th>Created At</th>
                                <th>Action</th>
                                
                            
                            </tr>
                        </thead>

                            <tbody>
                                <?php
                                    include_once "fash/admin.php";
                                    //create new obj
                                    $obj = new Admin();
                                    $type = "user";
                                    $users = $obj->getAllUsers($type);

                                    // echo "<pre>";
                                    // print_r($users);
                                    // echo "</pre>";
                                
                                    if (count($users) > 0) {
                                        $kounter = 0;
                                        foreach ($users as $key => $value) {
                                    
                                ?>
                                    <tr>
                                        <td><?php echo ++$kounter?></td>
                                        <td><?php echo $value['lastname']?></td>
                                        <td><?php echo $value['firstname']?></td>
                                        <td><?php echo $value['email']?></td>
                                        <td><?php echo $value['phoneno']?></td>
                                        <td><?php echo $value['gender']?></td>
                                        <td><?php echo $value['usertype']?></td>
                                        <td><?php echo date('D j F Y', strtotime($value['date_joined'])) ?></td>
                                        <td><a href="deleteusers.php?usersid=<?php echo $value['users_id'] ?>&usersname=<?php echo $value['firstname']." ". $value['lastname'] ?>" class="btn btn-danger btn-sm" style="color:white !important">Delete</a></td>
                                    </tr>
                                <?php
                                    }
                                }

                                ?>




                                
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include_once "profooter.php"?>