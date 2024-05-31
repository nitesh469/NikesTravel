<?php require "../layout/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php
  if(isset($_SESSION['adminname'])){
    $cities = $conn->query("SELECT * FROM cities");
    $cities->execute();
    $allCities = $cities->fetchAll(PDO::FETCH_OBJ);
  }
?>
<div class="container mt-4">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered text-center">
              <thead>
                <tr class="table-dark">
                  <td colspan="6">
                    <h4 class="text-center pt-2">All City</h4>
                  </td>
                </tr>
                <tr class="table-light">
                  <th scope="col"> SN. </th>
                  <th scope="col"> NAME </th>
                  <th scope="col"> IMAGE </th>
                  <th scope="col"> TRIP_DAYS </th>
                  <th scope="col"> PRICE </th>
                  <th scope="col">DELETE  </th>
                </tr>
              </thead>
              <tbody>
                <?php $a=1; ?>
                <?php foreach($allCities as $city) : ?> 
                <tr>
                  <th> <?php echo $a; ?> </th>
                  <td> <?php echo $city->name; ?> </td>
                  <td>image</td>
                  <td> <?php echo $city->trip_days; ?> </td>
                  <td> <?php echo $city->price; ?> </td>
                  <td><a href="delete-cities.php?id=<?php echo $city->id; ?>" class="btn btn-danger  text-center "> DELETE </a></td>
                </tr>
                <?php $a++; ?>
                <?php endforeach; ?>

                <tr>
                  <td colspan="6">
                    <a href="create-cities.php" class="btn btn-primary m-3 text-center float-end"> ADDCity</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php require "../layout/footer.php"; ?>