<?php
    include_once "constants.php";

    class Product{
        //member variables
        var $productname;
        var $productprice;
        var $productdesc;
        var $mydbcon;

        //member functions

        function __construct(){
            $this->mydbcon = new MySQLi(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
            if ($this->mydbcon->connect_error) {
                die("Connection Failed: ". $this->mydbcon->connect_error);
            }else {
               //echo "Connection Successful";
            }
        }

        #begin of addproduct method
        function addProduct($productname, $category, $productprice, $productdesc, $usersid){
            //var_dump($productname, $category, $productprice, $productdesc, $usersid);
            //exit();
            //process file upload
            $filename = $_FILES['productimg']['name'];
            $file_tmp_name = $_FILES['productimg']['tmp_name'];
            $destination = "upload/$filename";

            if (move_uploaded_file($file_tmp_name, $destination)) {
                #add record into product table

                //prepare statement
                $stmt = $this->mydbcon->prepare("INSERT INTO product(product_name, category_id, product_price, product_description, users_id) 
                VALUES(?,?,?,?,?)");
               
                //bind parameters
                $stmt->bind_param("ssdsi", $productname, $category, $productprice, $productdesc, $usersid);
               
                //execute
                $stmt->execute();

                if ($stmt->affected_rows == 1) {
                    $productid = $stmt->insert_id;
                    $statement = $this->mydbcon->prepare("INSERT INTO product_img(img_url, product_id) VALUES(?,?)");
                    $statement->bind_param("si", $filename, $productid);
                    $statement->execute();
                    if ($statement->affected_rows == 1) {
                        return "success";
                    }else {
                        return "Oops! something went wrong ".$statement->error;;
                      
                    }
                }
            }else {
                return "Oops! something happened";
            }
        }
        #end of addproduct method


        #begin of allproducts method
        function getUsersProducts($usersid){
            //prepare statement
            $stmt = $this->mydbcon->prepare("SELECT * FROM product LEFT JOIN product_img 
            ON product.product_id = product_img.product_id LEFT JOIN category ON 
            product.category_id = category.category_id WHERE users_id=?");
            //bind parameter
            $stmt->bind_param("i", $usersid);
            //execute
            $stmt->execute();
            //get result set
            $result = $stmt->get_result();
            //fetch records from result set
                $record = array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $record[] = $row;
                }
            }
            return $record;
        }
        #end of allproducts method


        #begin of getallproduct method
        function getAllCategory(){
            //prepare statement
            $stmt = $this->mydbcon->prepare("SELECT * FROM category");
             //execute
            $stmt->execute();
             //get result set
            $result = $stmt->get_result();
             //fetch records from result set
            $records = array();
             if($result->num_rows > 0){
                 while($row = $result->fetch_assoc()){
                    $records[] = $row;
                 }
                }
                return $records;
        }
        #end of getallproduct method


        #begin of updateproduct method
        function updateProduct($productname, $category, $productprice, $productdesc, $usersid, $productid){
            
            // var_dump($productname, $category, $productprice, $productdesc, $usersid,);
            // exit();

            //process file upload
            $filename = $_FILES['productimg']['name'];;
            $file_tmp_name = $_FILES['productimg']['tmp_name'];
            $destination = "upload/$filename";

            if (move_uploaded_file($file_tmp_name, $destination)) {
                #add record into product table

                //prepare statement
                $stmt = $this->mydbcon->prepare("UPDATE product SET product_name=?, category_id=?, product_price=?, product_description=?,users_id=? WHERE product_id=?"); 
                
                //bind parameters
                $stmt->bind_param("ssdsii", $productname, $category, $productprice, $productdesc, $usersid, $productid);
               
                //execute
                $stmt->execute();

                if ($stmt->affected_rows == 1) {
                    $productid = $stmt->insert_id;
                    $statement = $this->mydbcon->prepare("UPDATE product_img SET img_url=? WHERE product_id=?");
                    $statement->bind_param("si", $filename, $productid);
                    $statement->execute();
                    if ($statement->affected_rows == 1) {
                    return "success";
                    }elseif($statement->affected_rows == 0){
                        return "No update made";
                    }else{
                        return "Oops! something went wrong ".$statement->error;
                    }
                }
            }else {
                return "Oops! something happened";
            } 

        }
        #end of updateproduct method

        #begin of getproduct method
        function getProduct($productid){
            //prepare statement
            $statement = $this->mydbcon->prepare("SELECT * FROM product WHERE product_id=?");
            //bind parameter
            $statement->bind_param("i",$productid);
            //execute
            $statement->execute();

            $result = $statement->get_result();

            if ($result->num_rows == 1) {
                # fetch n return record
                return $result->fetch_assoc();
            }else{
                return "Oops! Something went wrong";
            }
        }
        #end of getproduct method


        #begin of getproductimg method
        function getproductimg($productid){
            //prepare staement
            $stmt = $this->mydbcon->prepare("SELECT * FROM product_img WHERE product_id = ?");
            //bind parameter
            $stmt->bind_param("i", $productid);
            //execute
            $stmt->execute();
            //fetch data
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                return $result->fetch_assoc();
            }else{
                return "Oops! something went wrong";
            }
        }

        #end of getproductimg method


        #begin of deleteproduct method
        function deleteProduct($productid){
            //prepare statement
            $statement = $this->mydbcon->prepare("DELETE FROM product_img WHERE product_id=?");
            //bind parameter
            $statement->bind_param("i",$productid);
            //execute
            $statement->execute();

            if($statement->affected_rows == 1){
                
                $stmt = $this->mydbcon->prepare("DELETE FROM product WHERE product_id=?");
                $stmt->bind_param("i", $productid);
                $stmt->execute();
                if ($stmt->affected_rows) {
                    return "success";
                }else {
                    return "Oops! something went wrong ".$stmt->error;;
                    
                }
                return true;
            }else{
                return false;
            }
        }

        #end of deleteproduct method


        #begin of getProductByCategory by category method
        function getProductByCategory($categoryid){
            //prepare statement
            $stmt = $this->mydbcon->prepare("SELECT * FROM product JOIN product_img ON 
            product.product_id = product_img.product_id WHERE category_id = ?");
            //bind parameter
            $stmt->bind_param("i", $categoryid);
            //execute
            $stmt->execute();
            //get result
            $result = $stmt->get_result();
       
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                   $records[] = $row;
                }
            }else{
                $records[] = "Category Not Available";
            }
               return $records;
        }
        #begin of getProductByCategory by category method



        #begin of getsingleProduct method
        function getSingleProduct($productid){
            //prepare statement
            $stmt = $this->mydbcon->prepare("SELECT * FROM product LEFT JOIN product_img ON product.product_id = product_img.product_id LEFT JOIN users ON product.users_id = users.users_id WHERE product.product_id = ?");
            //bind parameter
            $stmt->bind_param("i", $productid);
            //execute
            $stmt->execute();
            //get result
            $result = $stmt->get_result();
      
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $records[] = $row;
                 }
             }else{
                 $records[] = "Product Not Available";
             }
                return $records;
           
        }
        #end of get a single Product method



        #begin of featuteProduct method
        function featureProduct(){
            //prepare statement
            $stmt = $this->mydbcon->prepare("SELECT * FROM `product` JOIN product_img ON 
            product.product_id = product_img.product_id LIMIT 8");
            //execute
            $stmt->execute();
            //fetch result set
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
               while ($rows = $result->fetch_assoc()) {
                    $records[] = $rows;
               }
            }else{
                $records[] = "No Record Found";
            }
            return $records;
        }


        #end of featuteProduct method



       
        
    }

?>