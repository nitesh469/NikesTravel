<?php require "../layout/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php
if (!isset($_SESSION['adminname'])) {
  header("location:" . ADMINURL . "/admins/login-admins.php");
} 
else {
  if (isset($_POST['add_city'])) {
    if(empty($_POST['name']) or empty($_POST['trip_days']) or empty($_POST['price']) or empty($_POST['description']) or empty($_POST['countries'])) {
      echo "<script> alert('some input are missing.') </script>";
      echo $_POST['countries'];
    } 
    else {
      $name = $_POST['name'];
      $trip_days = $_POST['trip_days'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $countries = $_POST['countries'];
      $image = $_FILES['image']['name'];

      $dir = "image-cities/" . basename($image);

      //insert the datas
      $insert_city = $conn->prepare("INSERT INTO cities(name, trip_days, price, description, country_id, image) VALUES (:name, :trip_days, :price, :description, :countries, :image)");
      $insert_city->execute([
        ":name" => $name,
        ":trip_days" => $trip_days,
        ":price" => $price,
        ":description" => $description,
        ":countries" => $countries,
        ":image" => $image,        
      ]);
      if (move_uploaded_file($_FILES['image']['tmp_name'], $dir)) {
        header("location:show-cities.php");
      }
    }
  }
}
?>
<div class="container mt-4 mb-4">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-5 text-center">ADD Cities</h5>
            <form method="POST" action="create-cities.php" enctype="multipart/form-data">
              <!-- Email input -->
              <div class="form-outline mb-4 mt-4">
                <lable class="fw-semibold ms-2"> City Name </lable>
                <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />

              </div>
              <div class="form-outline mb-4 mt-4">
                <lable class="fw-semibold ms-2"> Choose Image </lable>
                <input type="file" name="image" id="form2Example1" class="form-control" />

              </div>
              <div class="form-outline mb-4 mt-4">
                <lable class="fw-semibold ms-2"> Trip Days </lable>
                <input type="text" name="trip_days" id="form2Example1" class="form-control" placeholder="trip_days" />

              </div>
              <div class="form-outline mb-4 mt-4">
                <lable class="fw-semibold ms-2"> Trip Price </lable>
                <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />

              </div>
              <div class="form-outline mb-4 mt-4">
                <lable class="fw-semibold ms-2"> Description</lable>
                <textarea name="description" class="form-control mt-2" placeholder="description" id="floatingTextarea2" style="height: 100px"></textarea>
              </div>
              <div class="form-outline mb-4 mt-4">
                <lable class="fw-semibold ms-2"> Country </lable>
                <select name="countries" class="form-select  form-control" aria-label="Default select example">
                  <option selected>Choose Country</option>
                  <option value="1">Egypt</option>
                  <option value="2">Egypt</option>
                  <option value="3">Egypt</option>
                </select>
              </div>


              <!-- Submit button -->
              <button type="submit" name="add_city" class="btn btn-primary float-end m-3 text-center"> ADD City</button>

            </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require "../layout/footer.php"; ?>