<?php require '../layout/header.php'; ?>
<?php require '../../config/config.php'; ?>
<?php
if(isset($_SESSION['adninname'])){
  
  if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $image_delete = $conn->query("SELECT * FROM countries WHERE id='$id'");
  $image_delete->execute();
  $getImage = $image_delete->fetch(PDO::FETCH_OBJ);
  //delete image
  unlink("images_countries/" . $getImage->image);
  
  //delete the record
    $deleteRecord = $conn->query("DELETE FROM countries WHERE id='$id'");
    $deleteRecord->execute();

    header("location:show-country.php");
  } 
}
else {
  header("location:" . ADMINURL . "/admins/login-admins.php");
}