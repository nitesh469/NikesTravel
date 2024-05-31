<?php require "../layout/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php 

    if(isset($_SESSION['adminname'])) {

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $delete_image = $conn->query("SELECT * FROM cities WHERE id='$id'");
            $delete_image->execute();
            $getImage = $delete_image->fetch(PDO::FETCH_OBJ);
            //delete image
            unlink("image-cities/" . $getImage->image);
            //delete record..
            $delete_record = $conn->query("DELETE FROM cities WHERE id='$id'");
            $delete_record->execute();

            header("location:show-cities.php");

        }
    }
    else{
        header("location:" . ADMINURL . "/admins/login-admins.php");
    }