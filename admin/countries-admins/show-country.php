<?php require '../layout/header.php'; ?>
<?php require '../../config/config.php'; ?>
<?php
if (isset($_SESSION['adminname'])) {
  $countries = $conn->query("SELECT * FROM countries");
  $countries->execute();
  $allCountries = $countries->fetchAll(PDO::FETCH_OBJ);
} else {
  header("location:" . ADMINURL . "/admins/login-admins.php");
}
?>
<div class="container-fluid mt-5 mb-5">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <table class="table table-bordered text-center">
            <thead>
              <tr class="table-dark">
                <td colspan="6">
                  <h4 class="text-center pt-2"> Countries </h4>
                </td>
              </tr>
              <tr class="table-light">
                <th scope="col"> SN. </th>
                <th scope="col"> NAME </th>
                <th scope="col"> CONTINENT </th>
                <th scope="col"> POPULATION </th>
                <th scope="col"> TERRITORY </th>
                <th scope="col"> DELETE </th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <?php $a=1; ?>
              <?php foreach ($allCountries as $country) : ?>
                <tr>
                  <th> <?php echo $a; ?> </th>
                  <td> <?php echo $country->name; ?> </td>
                  <td> <?php echo $country->continent; ?> </td>
                  <td> <?php echo $country->population; ?> </td>
                  <td> <?php echo $country->territory; ?> </td>
                  <td><a href="delete-country.php?id=<?php echo $country->id; ?>" class="btn btn-danger  text-center ">Delete</a></td>
                </tr>
                <?php $a++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
          <tr>
            <td colspan="6">
              <a href="<?php echo ADMINURL; ?>/countries-admins/create-country.php" class="btn btn-primary m-4 p-2 text-center float-end">Create Country</a>
            </td>
          </tr>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require '../layout/footer.php'; ?>