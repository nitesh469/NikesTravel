<?php require '../layout/header.php'; ?>
<?php require '../../config/config.php'; ?>
<?php

if (isset($_SESSION['adminname'])) {
  header('location:' . ADMINURL . '/admins/admins.php');
} 
else {

  //take the data from the inputs
  if (isset($_POST['submit'])) {

    if (empty($_POST['email']) or empty($_POST['password'])) {
      echo "<script> alert('some inpute are empty'); </script> ";
    } else {
      $email = $_POST['email'];
      $password = $_POST['password'];


      //check for the email with a query first
      $login = $conn->query("SELECT * FROM admins WHERE email='$email'");
      $login->execute();

      $fetch = $login->fetch(PDO::FETCH_ASSOC);

      if ($login->rowCount() > 0) {
        //check for the password with password verify
        if (password_verify($password, $fetch['mypassword'])) {
          $_SESSION['adminname'] = $fetch['adminname'];
          $_SESSION['user_id'] = $fetch['id'];

          header("location:" . ADMINURL . "");
          // echo "<script> alert('some inpute are  pass email'); </script> ";
        } else {
          echo "<script> alert('some inpute are  pass email'); </script> ";
        }
      } else {
        echo "<script> alert('some inpute are  pass email'); </script> ";
      }
    }
  }
}




?>
<div class="container mt-5">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-5 text-center">Login</h4>
          <form method="POST" class="p-auto" action="login-admins.php">
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
            </div>
            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
            </div>
            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary float-end  m-3 text-center">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require '../layout/footer.php'; ?>