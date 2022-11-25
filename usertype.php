<?php
    $page_title = "Usertype";
    include_once "proheader.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h2>Choose UserType</h2>
            <div class="col">
                <input type="radio" id="user" name="user" value="User" class="">
                <label for="form-control">User</label>

                <input type="radio" id="brand" name="brand" value="brand" class="">
                <label for="form-control">Brand</label>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function(){
           
        })

    </script>
</body>
</html>