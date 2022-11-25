<?php
    if (isset($_REQUEST['status'])) {
        //add class
        include_once "fash/admin.php";
        $obj = new Admin();
        $status = $obj->status($_REQUEST['productid']);

        if ($status == '1') {
    ?>
        <script src="js/jquery.min.js"></script>
        <script type="text/javascript" language="javascript">

            $(document).ready(function(){
                    $('#status').hide();
            })

        </script>

    <?php
        }elseif($status == '0'){
    ?>
    
        <script src="js/jquery.min.js"></script>
        <script type="text/javascript" language="javascript">

            $(document).ready(function(){
                    $('#status').show();
            })

        </script>
    <?php
        }
        header("Location: approveproduct.php");
    }
?>