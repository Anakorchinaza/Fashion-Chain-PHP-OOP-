<?php  
    include_once "constants.php";

    class Comments{
        //member variables
        var $content;
        var $mydbcon; // database connection

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

         #begin addComment method
         function addComments($postid, $content, $userid){
            //prepare statement
            $stmt = $this->mydbcon->prepare("INSERT INTO comments (post_id, content, users_id) VALUE (?,?,?)" );
            //bind para
            $stmt->bind_param("isi", $postid, $content, $userid);
            //execute
            $stmt->execute();

            if ($stmt->affected_rows == 1) {
                return 'success';
            }else{
                return 'Oops! Something went wrong';
            }
        }
        #end addComment method


        #begin getAllComments method
        function getAllComments($postid){
            //prepare statment
            $stmt = $this->mydbcon->prepare("SELECT * FROM comments JOIN users ON 
            comments.users_id = users.users_id WHERE post_id = ? ORDER BY comment_id DESC ");
            //bind parameter
            $stmt->bind_param("i", $postid);
            //execute
            $stmt->execute();
            //fetch data
            $result = $stmt->get_result();

                $records = array();
            if ($result->num_rows > 0) {
                while ($rows = $result->fetch_assoc()) {
                    $records[] = $rows;
                }
            }
            return $records;  
        }
        #end getAllComments method


        #begin totalComent method
        function totalComments($postid){
            //prepare statement
            $stmt = $this->mydbcon->prepare("SELECT COUNT(*) FROM comments where post_id = ?");
            //bind parameter
            $stmt->bind_param("i", $postid);
            //execute
            $stmt->execute();
            //fetch result
            $result = $stmt->get_result();

            $records = array();
            if ($result->num_rows > 0) {
                while ($rows = $result->fetch_assoc()) {
                    $records[] = $rows;
                }
            }
            return $records;
        }
        #end totalComment Method


        #begin getComment method
        function getComment($commentid){
            //prepare statement
            $stmt = $this->mydbcon->prepare("SELECT * FROM comments JOIN users ON 
            comments.users_id = users.users_id WHERE comment_id = ?");
            //bind parameter
            $stmt->bind_param("i", $commentid);
            //execute
            $stmt->execute();
            //fetech result
            $result = $stmt->get_result();

            $records = array();
            if ($result->num_rows > 0) {
                while ($rows = $result->fetch_assoc()) {
                    $records[] = $rows;
                }
            }
            return $records;
        }

        #end getComment method




        #begin updateComments method
        function updateComment($content, $commentid){
            //prepare statement
            $stmt = $this->mydbcon->prepare("UPDATE comments SET content=? WHERE comment_id=?");
            //bind parameters
            $stmt->bind_param("si", $content, $commentid);
            //execute
            $stmt->execute();

            if ($stmt->affected_rows == 1) {
                return 'success';
            }elseif($stmt->affected_rows == 0){
                return 'No Update Made';
            }else{
                return 'Oops!, something went wrong'.$stmt->error;
            }
        }
        #end updateComments method


        #begin deleteComments method
        function deleteComment($commentid){
            //prepare statement
            $stmt = $this->mydbcon->prepare("DELETE FROM comments WHERE comment_id=?");
            //bind parameters
            $stmt->bind_param("i", $commentid);
            //execute
            $stmt->execute();

            if ($stmt->affected_rows == 1) {
               return true;
            }else{
                return false;
            }
        }
        #end deleteComments method
    }
?>