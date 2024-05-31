<!-- ***** Header Aria Calling ***** -->
<?php require 'layout/header.php'; ?>
<?php require '../config/config.php'; ?>
<?php 
// count of total country in databases
$countries = $conn->query("SELECT COUNT(*) AS countries_count FROM countries");
$countries->execute();
$allCountries = $countries->fetch(PDO::FETCH_OBJ);

//count of total city in database
$cities = $conn->query("SELECT COUNT(*) AS cities_count FROM cities");
$cities->execute();
$allCities = $cities->fetch(PDO::FETCH_OBJ);

//count of tatal ADMIN in database
$admins = $conn->query("SELECT COUNT(*) AS admins_count FROM admins");
$admins->execute();
$allAdmin = $admins->fetch(PDO::FETCH_OBJ);

//count of total bookings in database

$bookings = $conn->query("SELECT COUNT(*) AS bookings_count FROM bookings");
$bookings->execute();
$allBookings = $bookings->fetch(PDO::FETCH_OBJ);



?>

<?php if(isset($_SESSION['adminname'])) : ?>
<!-- content -->
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-6 col-md-3">
      <div class="card mt-4">
        <div class="card-body pt-1 text-center">
          <h4 class="card-title mt-3 mb-4"> COUNTRIES </h4>
          <h6 class="card-subtitle mb-4 text-body-secondary"><strong> Total No Off COUNTRY : <?php echo $allCountries->countries_count; ?></strong></h6>
        </div>
      </div>

    </div>
    <div class="col-sm-6 col-md-3">
      <div class="card mt-4">
        <div class="card-body pt-1 text-center">
          <h4 class="card-title mt-3 mb-4"> CITIES </h4>
          <h6 class="card-subtitle mb-4 text-body-secondary"><strong> Total No Off CITY : <?php echo $allCities->cities_count; ?></strong></h6>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="card mt-4">
        <div class="card-body pt-1 text-center">
          <h4 class="card-title mt-3 mb-4"> ADMINS </h4>
          <h6 class="card-subtitle mb-4 text-body-secondary"><strong> Total No Off ADMIN : <?php echo $allAdmin->admins_count; ?> </strong></h6>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="card mt-4">
        <div class="card-body pt-1 text-center">
          <h4 class="card-title mt-3 mb-4"> BOOKINGS </h4>
          <h6 class="card-subtitle mb-4 text-body-secondary"><strong> Total No Off BOOKING : <?php echo $allBookings->bookings_count; ?> </strong></h6>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- content -->
<?php else: ?>

  <h2> welcome to admin pannel </h2>


<?php endif; ?>


<!-- ***** Header Aria Calling ***** -->
<?php require 'layout/footer.php'; ?>