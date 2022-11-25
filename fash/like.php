<?php  
    include_once "fash/constants.php";

    class Likes{
        //member variables
        var $mydbcom;

        //member function
        function __construct()
        {
            $this->mydbcon = new mysqli(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
            if ($this->mydbcon->connect_error) {
                die("Connection Failed: ".$this->mydbcon->connect_error);
            }else{
                //echo "Connection Successfully";
            }
        }

        #begin addlike method
        function addlikes($postid, $userid, $likevalue){
            //prepare statement
            $stmt = $this->mydbcom->prepare("INSERT INTO likes (post_id, users_id, likes_value) VALUE (?,?,?)");
            //bind para
            $stmt->bind_param("iii", $postid, $userid, $likevalue);
            //execute
            $stmt->execute();

            if ($stmt->affected_row == 1) {
                return 'success';
            }else{
                return 'Oops! something went wrong';
            }
        }
        #end addlike method


    }
?>