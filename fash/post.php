<?php
    include_once "constants.php";

    class Post{
        //member variables
        var $title;
        var $content;
        var $mydbcon;

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

        #begin create post method
        function addPost($title, $content, $userid){
            //prepare statement
            $stmt = $this->mydbcon->prepare("INSERT INTO post (title, content, users_id) VALUE (?,?,?)");
            //bind para
            $stmt->bind_param("ssi", $title, $content, $userid);
            //execute
            $stmt->execute();

            if ($stmt->affected_rows == 1) {
                #record was successfully inserted
                return "success";
            }else{
                return "Oops! Something went wrong";
            }
        }
        #begin create post method


        #begin getallpost method
        function getAllPost(){
            //prepare statement
            $stmt = $this->mydbcon->prepare("SELECT * FROM post JOIN users ON 
            post.users_id = users.users_id ORDER BY post_id DESC LIMIT 15 ");
            //execute
            $stmt->execute();
            //get result
            $result = $stmt->get_result();

                $records = array();
            if ($result->num_rows > 0) {
               while ($rows = $result->fetch_assoc()) {
                    $records[] = $rows;
               }
            }
            return $records;
        }
        #end getallpost method


        #begin getpost method
        function getPost($postid){
            //prepare statement
            $stmt = $this->mydbcon->prepare("SELECT * FROM post JOIN users ON 
            post.users_id = users.users_id WHERE post_id = ?");
            //bind para
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
        #end getpost method


        #begin getuserspost method
        function getUsersPost($userid){
            //prepare statement
            $stmt = $this->mydbcon->prepare("SELECT * FROM post JOIN users ON 
            post.users_id = users.users_id WHERE users.users_id = ? ORDER BY post_id DESC");
            //bind para
            $stmt->bind_param("i", $userid);
            //execute
            $stmt->execute();
            //fetch result
            $result = $stmt->get_result();

                $records = array();
            if ($result->num_rows > 0) {
               while ($rows = $result->fetch_assoc()) {
                    $records[] = $rows;
               }
            }else{
                $records[] = "No Post Available";
            }
            return $records;
        }

        #end getuserspost method



        #begin updatepost method
        function updatePost($title, $content, $postid){
            //prepare statement
            $stmt = $this->mydbcon->prepare("UPDATE post SET title=?, content=? WHERE post_id=? ");
            //bind para
            $stmt->bind_param("ssi", $title, $content, $postid,);
            //execute
            $stmt->execute();

            if ($stmt->affected_rows == 1) {
                return "success";
            }elseif ($stmt->affected_rows == 0) {
                return "No Update Made";
            }else {
                return "Oops! Something went wrong". $stmt->error;
            }
        }
        #end updatepost method


        #begin delete post method
        function deletePost($postid){
            //prepare statement
            $stmt = $this->mydbcon->prepare("DELETE FROM post WHERE post_id=?");
            //bind para
            $stmt->bind_param("i", $postid);
            //execute
            $stmt->execute();

            if ($stmt->affected_rows == 1) {
                return true;
            }else {
                return false;
            }
        }
        #end delete post method


       








        



    }

?>