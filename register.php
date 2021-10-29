<?php include("path.php") ?>
<?php include(ROOT_PATH . "/app/controllers/users.php"); 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- css link -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- font link -->
    <link
      href="https://fonts.googleapis.com/css2?family=Lato&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Cantora+One&display=swap"
      rel="stylesheet"
    />
    <title>Register</title>
  </head>

  <body>
   

  <?php include("app/includes/header.php") ?>

    <!-- page wrapper -->
    <div class="Auth">
   <div class="Auth-content">
<form action="register.php" method="post">
  <h2 class="form-title">Register</h2>
  <?php include(ROOT_PATH . '/app/Helpers/formErrors.php'); ?>
  <div>
    <label>Username</label>
    <input type="text" name="username" class="text-input" value="<?php echo htmlspecialchars($username); ?>">
  </div>
  <div>
    <label>Email</label>
    <input type="email" name="email" class="text-input" value="<?php echo htmlspecialchars($email); ?>">
  </div>
  <div>
    <label>Password</label>
    <input type="password" name="password" class="text-input" value="<?php echo htmlspecialchars($password); ?>">
  </div>
  <div>
    <label>Password Comfirmation</label>
    <input type="password" name="passwordconf" class="text-input" value="<?php echo htmlspecialchars($passwordconf); ?>">
  </div>
  <div>
  <button type="submit" name="submit" class="btn btn-big">register</button>
  </div>
  <p>or <a href="<?php echo(BASE_URL .'/login.php');?>">signin</a></p>
</form>
   </div>
  </div>
    <!-- //post wrapper -->
    <!-- font cdn -->
    <script src="https://use.fontawesome.com/9bf3da6d6d.js"></script>
    <!-- jquery cdn -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>


    <!-- javascript link -->
    <script src="assets/js/script.js"></script>
  </body>
</html>
