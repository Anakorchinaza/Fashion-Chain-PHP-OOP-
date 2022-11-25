<?php
    //add constants

use LDAP\Result;

    include_once "constants.php";

    //class definition
    class Users{
        //members variables
        var $lastname;
        var $firstname;
        var $pswd;
        var $email;
        var $phoneno;
        var $gender;
        var $brandname;
        var $usertype;
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

            #begining insert Users
            function insertUsers($lastname, $firstname, $pswd, $email, $phoneno, $gender, $brand_name, 
            $address, $website, $usertype){
            //encrypt password
            $password = password_hash($pswd, PASSWORD_DEFAULT);
            //prepare statement
            $statement = $this->mydbcon->prepare("INSERT INTO users(firstname, lastname, password, email,
            phoneno, usertype, gender, brand_name, address, website) VALUE(?,?,?,?,?,?,?,?,?,?)");
            //bind all parameters
            $statement->bind_param("ssssssssss", $firstname, $lastname, $password, $email, $phoneno, $usertype,
            $gender, $brand_name, $address, $website);
            //execute
            $statement->execute();
            
            if ($statement->error) {
                $result = "Oops! Something happened " .$statement->error;
            }else {
                $result = "success";
            }
            return $result;

        }
            #ending insert Users

    
        #beginning login method
        function login($email, $password){
            //prepare statement
            $statement = $this->mydbcon->prepare("SELECT * FROM users WHERE email=?");
            //bind parameter
            $statement->bind_param("s", $email);
            //execute
            $statement->execute();
            //result set
            $result = $statement->get_result();
            //fetch the data from result set
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                
                if (password_verify($password, $row['password'])) {
                    //password match, create session
                    session_start();
                    $_SESSION['users_id'] = $row['users_id'];
                    $_SESSION['lastname'] = $row['lastname'];
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['usertype'] = $row['usertype'];
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

        #ending login


        function getProfile2($users_id){
            //prepare the statement
            $stmt = $this->mydbcon->prepare("SELECT * FROM users  WHERE users_id=? ");
            //bind para
            $stmt->bind_param("i", $users_id);
            //execute
            $stmt->execute();
            //get result set
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                #fetch d record
                return $result->fetch_assoc();
            }else{
                return "Oops, something went wrong";
            }
        }
        #end users getProfile method



        #begin updateProfile method
        function updateUsers($lastname, $firstname, $phoneno, $brand_name, 
        $address, $website, $usersid){

        //prepare statement
        $statement = $this->mydbcon->prepare("UPDATE users SET lastname=?, firstname=?,
        phoneno=?, brand_name=?, address=?, website=? WHERE users_id=?");
        //bind all parameters
        $statement->bind_param("ssssssi", $lastname, $firstname, $phoneno,
         $brand_name, $address, $website, $usersid);
        //execute
        $statement->execute();
        
            if ($statement->affected_rows == 1) {
                return 'success';
            }elseif($statement->affected_rows == 0){
                return "No update made";
            }else{
                return "Oops! something went wrong ";
            }
        }
        #end updateProfile method

        
        #begin logout method
        function logout(){
            session_start();
            session_destroy();
            //redirect the user to login page
            header("Location: login.php");
            exit();
        }
        #end logout method


        #begin search method
        function search($search){
            //prepare statement
            $stmt = $this->mydbcon->prepare("SELECT * FROM `product` LEFT JOIN users ON 
            product.users_id = users.users_id LEFT JOIN product_img ON product.product_id = product_img.product_id 
            WHERE product_name LIKE ? OR brand_name LIKE ?");
            //bind para
            $searchstr = "%$search%";
            $stmt->bind_param("ss", $searchstr, $searchstr);
            //execute
            $stmt->execute();
            //fetch result
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
               while ($rows = $result->fetch_assoc()) {
                    $records[] = $rows;
               }
            }
            return $records;
        }

        #end search method


        




       

    }
        






    
?>

