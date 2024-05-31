<?php 

    session_start();
    session_unset();
    session_destroy();

    header("location:http://localhost:8080/nikestravel/admin/admins/login-admins.php");

?>