<?php require '../layout/header.php'; ?>
<?php require '../../config/config.php'; ?>
<?php
if (isset($_SESSION['adminname'])) {
  $admin = $conn->query("SELECT * FROM admins");
  $admin->execute();
  $allAdmin = $admin->fetchAll(PDO::FETCH_OBJ);
} else {
  header("location:" . ADMINURL . "/admins/login-admins.php");
}

?>
<div class="container-fluid mt-5">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <table class="table table-bordered text-center">
            <thead>
              <tr class="table-light">
                <td colspan="6">
                  <h4 class="text-center pt-2"> ADMIN</h4>
                </td>
              </tr>
              <tr class="table-light">
                <th scope="col"> SN. </th>
                <th scope="col"> ADMIN NAME </th>
                <th scope="col"> EMAIL </th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <?php $a = 1; ?>
              <?php foreach ($allAdmin as $admin) : ?>
                <tr>
                  <th> <?php echo $a; ?> </th>
                  <td> <?php echo $admin->adminname; ?></td>
                  <td> <?php echo $admin->email; ?></td>
                </tr>
                <?php $a++; ?>
              <?php endforeach; ?>
              <tr>
                <td colspan="3">
                  <a href="<?php echo ADMINURL; ?>/admins/create-admins.php" class="btn btn-primary me-3 mt-1 mb-1 text-center float-end"> Create Admin</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require '../layout/footer.php'; ?>