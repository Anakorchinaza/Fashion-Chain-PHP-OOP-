<?php
    //add constant
    include_once "constants.php";
    include_once "fash/admin.php";

    //class definition
    class Admin{
        //member variable
        var $admin_email;
        var $admin_password;
        var $mydbcon; //database connection handler

        //member method
        function __construct(){
            $this->mydbcon = new MySQLi(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
            if ($this->mydbcon->connect_error) {
                die("Connection Failed: ". $this->mydbcon->connect_error);
            }else {
               //echo "Connection Successful";
            }
        }

        #begin adminLogin method
        function adminLogin($admin_email, $admin_password){
            //prepare statement
            $statement = $this->mydbcon->prepare("SELECT * FROM admin WHERE admin_email=?");
            //bind para
            $statement->bind_param("s", $admin_email);
            //execute
            $statement->execute();
            //result set
            $result = $statement->get_result();
            //fetch data from result set
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();

                if (password_verify($admin_password, $row['admin_password'])) {
                    //password match
                    session_start();
                    $_SESSION['admin_id'] = $row['admin_id'];
                    $_SESSION['admin_email'] = $row['admin_email'];
                    $_SESSION['logger'] = "RUBY";

                    return true;
                }else {
                    //password does not match
                    return false;
                }
            }else {
                //email does not exist
                return false;
            }

        }
        #end adminLogin method


        #begin addcategory method
        function addCategory($categoryname){
             //process file upload
             $filename = $_FILES['category_img']['name'];
             $file_tmp_name = $_FILES['category_img']['tmp_name'];
             $destination = "category/$filename";

             if(move_uploaded_file($file_tmp_name, $destination)){
                    #insert record into category table

                    //prepare statement
                    $stmt = $this->mydbcon->prepare("INSERT INTO category (category_name, category_img) VALUES (?,?) ");
                    //bind parameters
                    $stmt->bind_param("ss", $categoryname, $filename);
                    //execute
                    $stmt->execute();
                    //die($stmt->num_rows);

                    if ($stmt->affected_rows == 1) {
                        #record was successfully inserted--you can check for errors too as done in phoenix/students.php
                        return "success";
                    }else{
                        return "Oops! something went wrong ".$stmt->error;
                    }
            }else{
                return "Oops! something happened";
            }
        }
        #end addcategory method


        
        #begin getAllcategory method
        function getAllCategory(){
            //prepare statement
            $statement = $this->mydbcon->prepare("SELECT * FROM category");
            //execute
            $statement->execute();
            //get result set
            $result = $statement->get_result();
            //fetch records from result set
            $records = array();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $records[] = $row;
                }
            }
            return $records;

        }
    #end getAllCategory method



    #begining UpdateCategory method
    function updateCategory($categoryname, $file, $categoryid){
        //process file upload
        $filename = $file['name'];
        $file_tmp_name = $file['tmp_name'];
        $destination = "category/$filename";

        if(move_uploaded_file($file_tmp_name, $destination)){
               #insert record into category table

               //prepare statement
               $stmt = $this->mydbcon->prepare("UPDATE category SET category_name=?, category_img=? WHERE category_id=?");
               //bind parameters
               $stmt->bind_param("ssi", $categoryname, $filename, $categoryid);
               //execute
               $stmt->execute();
               //die($stmt->num_rows);

               if ($stmt->affected_rows == 1) {
                return "success";
            }elseif($stmt->affected_rows == 0){
                return "No update made";
            }else{
                return "Oops! something went wrong ".$stmt->error;
            }
       }else{
           return "Oops! something happened";
       }
   }
    #ending UpdateCategory method


    #begin getCategory method
    function getCategory($categoryid){
         //prepare statement
         $statement = $this->mydbcon->prepare("SELECT * FROM category WHERE category_id=?");
         //bind parameter
         $statement->bind_param("i",$categoryid);
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

    #end getCategory method


    #begin delete method
    function deleteCategory($categoryid){
        //prepare statement
        $statement = $this->mydbcon->prepare("DELETE FROM category WHERE category_id=?");
        //bind parameter
        $statement->bind_param("i",$categoryid);
        //execute
        $statement->execute();

        if($statement->affected_rows == 1){
            return true;
        }else{
            return false;
        }
    }
    #end delete method


    #begin view allusers method
    function getAllUsers($usertype){
        //prepare statement
        $stmt = $this->mydbcon->prepare("SELECT * FROM users WHERE usertype=?");
        //bind statement
        $stmt->bind_param("s", $usertype);
        //execute
        $stmt->execute();
        //get result
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $records[] = $row;
          }
          return $records;
        }else{
            return "No Record";
        }
    }

    #end view allusers method


    
    #begin view allusers method
    function getAllBrands($usertype){
        //prepare statement
        $stmt = $this->mydbcon->prepare("SELECT * FROM users WHERE usertype=?");
        //bind statement
        $stmt->bind_param("s", $usertype);
        //execute
        $stmt->execute();
        //get result
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $records[] = $row;
          }
          return $records;
        }else{
            return "No Record";
        }
    }

    #end view allusers method


    #begin delete users method
    function deleteUsers($userid){
        //prpare statement
        $statement = $this->mydbcon->prepare("DELETE FROM users WHERE users_id=?");
        //bind parameter
        $statement->bind_param("s", $userid);
        //execute
        $statement->execute();

        if ($statement->affected_rows == 1) {
          return true;
        }else{
            return false;
        }
    }
    #end delete users method


    #begin approveProduct method
    function approveProduct(){
        //prepare statement
        $stmt = $this->mydbcon->prepare("SELECT * FROM product LEFT JOIN product_img ON product.product_id = product_img.product_id LEFT JOIN category ON product.category_id = category.category_id LEFT JOIN users ON product.users_id = users.users_id;");
        //execute
        $stmt->execute();
        //fetch result
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($rows = $result->fetch_assoc()) {
               $records[] = $rows;
            }
        }else{
            $record[] = "No record";
        }
        return $records;
    }
    #end approveProduct method


    #begin status method
    function status($productid){
        //prepare statement
        $stmt = $this->mydbcon->prepare("UPDATE product SET status = '1' WHERE product_id = ?");
        //bind para
        $stmt->bind_param("i", $productid);
        //execute
        $stmt->execute();

        if ($stmt->affected_rows == 1) {
            return "success";
        }elseif($stmt->affected_rows == 0){
            return "success";
        }else{
            return "Oops! something went wrong";
        }
    }
    #begin status method
    

    









    }

?>
