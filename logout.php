<?php
    $page_title = "Logout";
    include_once "fash/myusers.php";
    $usersobj = new Users();
    //reference the logout method
    $usersobj->logout();

?>