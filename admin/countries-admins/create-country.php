<?php require "../layout/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php
if(!isset($_SESSION['adminname'])){
  header('location:'.ADMINURL.'/admins/login-admins.php');
}
else{
  if(isset($_POST['add-country'])){
    if(empty($_POST['name']) or empty($_POST['continent']) or empty($_POST['population']) or empty($_POST['territory']) or empty($_POST['description'])){
      echo "<script> alert('Some Input are Misssing..')";
    }
    else{
      $name = $_POST['name'];
      $continent = $_POST['continent'];
      $population = $_POST['population'];
      $territory = $_POST['territory'];
      $description = $_POST['description'];
      $image = $_FILES['image']['name'];

      $dir = "images_countries/" . basename($image);

      $insert = $conn->prepare("INSERT INTO countries(name, continent, population, territory, description, image) VALUES (:name, :continent, :population, :territory, :description, :image)");
      $insert->execute([
        ":name" => $name,
        ":continent" => $continent,
        ":population" => $population,
        ":territory" => $territory,
        ":description" => $description,
        ":image" => $image,
      ]);
      if(move_uploaded_file($_FILES['image']['tmp_name'], $dir))  {
        header("location:show-country.php");
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
              <h4 class="card-title text-center">ADD Countries</h4>
              <form method="POST" action="create-country.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <lable class="fw-semibold ms-2">Country Name</lable>
                  <input type="text" name="name" id="form2Example1" class="form-control mt-2" placeholder="name" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                <lable class="fw-semibold ms-2"> Choose Image</lable>
                  <input type="file" name="image" id="form2Example1" class="form-control mt-2" />
                 
                </div>  
                <div class="form-outline mb-4 mt-4">
                <lable class="fw-semibold ms-2"> Continent</lable>
                  <input type="text" name="continent" id="form2Example1" class="form-control mt-2" placeholder="Continent" />
                 
                </div> 
                 <div class="form-outline mb-4 mt-4">
                 <lable class="fw-semibold ms-2"> Papulation</lable>
                  <input type="text" name="population" id="form2Example1" class="form-control mt-2" placeholder="population millions" />
                 
                </div>  <div class="form-outline mb-4 mt-4">
                <lable class="fw-semibold ms-2"> Territory</lable>
                  <input type="text" name="territory" id="form2Example1" class="form-control mt-2" placeholder="territory in km." />
                 
                </div> 
                <div class="form-floating">
                <lable class="fw-semibold ms-2"> Description</lable>
                  <textarea name="description" class="form-control mt-2" placeholder="description" id="floatingTextarea2" style="height: 100px"></textarea>
                </div>
           
      
                <!-- Submit button -->
                <button type="submit" name="add-country" class="btn btn-primary m-3 text-center float-end"> ADD Country</button>
              </form>

            </div>
          </div>
        </div>
      </div>
  </div>

<?php require "../layout/footer.php"; ?>