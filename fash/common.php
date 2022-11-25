<?php
//include constant
    include_once "constants.php";

    //class definition
    class Common{
        //member variables
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

        #begin sanitize inputs method
        function sanitizeInput($data){
            $data = trim($data);
            $data = strip_tags($data);
            $data = htmlspecialchars($data);
            $data = addslashes($data);
    
            return $data;
        }

        #end sanitize inputs method



    }


?>