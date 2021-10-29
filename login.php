<?php include "path.php"; ?>
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
    <title>Login</title>
  </head>

  <body>
  <?php include(ROOT_PATH ."/app/includes/header.php") ?>
    <!-- page wrapper -->
    <div class="Auth">
   <div class="Auth-content">
<form action="login.php" method="post">
  <h2 class="form-title">Login</h2>
  <?php include(ROOT_PATH . '/app/Helpers/formErrors.php'); ?>
  <div>
    <label>Username</label>
    <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" class="text-input">
  </div>
  <div>
    <label>Password</label>
    <input type="password" name="password" value="<?php echo htmlspecialchars($password); ?>" class="text-input">
  </div>
  <div>
  <button type="submit" name="login" class="btn btn-big">Login</button>
  </div>
  <p>or <a href="<?php echo(BASE_URL . '/register.php') ?>">sign up</a></p>
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
