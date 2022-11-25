<?php 
    if (isset($_REQUEST['searchstr'])) {
        //add class
        include_once "fash/myusers.php";
        //create obj of class
        $obj = new Users();
        //reference
        if (!empty($_REQUEST['searchstr'])) {
            $searchdata = $obj->search($_REQUEST['searchstr']);
            
            echo "<pre>";
            print_r($searchdata);
            echo "</pre>";
            exit();

            foreach ($searchdata as $key => $value) {
                if (empty($value['img_url'])) {
                    $image = "images/africa.jpg";
                }else{
                    $image = "upload/" .$value['img_url'];
                }
?>
                <div class="col-md-4">
                    <img src="<?php $image ?>" alt="image" class="img-fluid">
                    <h5><?php echo $value['product_name']?></h5>
                    <h5><?php echo $value['brand_name']?></h5>
                </div>
<?php
            }
        }else{
            echo "<div class='alert alert-warning'>No Record Found</div>";
        }
    }
?>