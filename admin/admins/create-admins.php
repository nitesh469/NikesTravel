<?php require '../layout/header.php'; ?>
<?php require '../../config/config.php'; ?>

<?php
if (!isset($_SESSION['adminname'])) {
  header("location:" . ADMINURL . "/admins/admins.php");
}
else {
  if (isset($_POST['submit'])) {
    if (empty($_POST['email']) or empty($_POST['adminname']) or empty($_POST['password'])) {
      echo "<script> alert('some input are missing'); </script>";
    } else {
      $email = $_POST['email'];
      $adminname = $_POST['adminname'];
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      // input the data in databases
      $insert = $conn->prepare("INSERT into admins(email, adminname, mypassword)VALUES(:email, :adminname, :password)");
      $insert->execute([
        ":email" => $email,
        ":adminname" => $adminname,
        ":password" => $password,
      ]);

      header("location:" . ADMINURL . "/admins/login-admins.php");
    }
  }
}
?>

<div class="container mt-5 mb-5">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 text-center">Create Admins</h5>
          <form method="POST" action="create-admins.php">
            <!-- Email input -->
            <div class="form-outline mb-4 mt-4">
              <lable name="email" class="fw-semibold fs-4 ms-2"> Email </lable>
              <input type="email" name="email" id="form2Example1" class="form-control mt-2" placeholder="email" required />
            </div>
            <div class="form-outline mb-4">
              <lable name="adminname" class="fw-semibold fs-4 ms-2">Adminname </lable>
              <input type="text" name="adminname" id="form2Example1" class="form-control mt-2" placeholder="username" required />
            </div>
            <div class="form-outline mb-4">
              <lable name="password" class="fw-semibold fs-4 ms-2"> Password </lable>
              <input type="password" name="password" id="form2Example1" class="form-control mt-2" placeholder="password" required />
            </div>
            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary m-4 text-center float-end"> Create</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require '../layout/footer.php'; ?>