<?php include('../../path.php'); ?>
<?php include(ROOT_PATH . '/app/controllers/users.php');
adminOnly();
?>

<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- css link -->
  <link rel="stylesheet" href="../../assets/css/style.css" />

  <!-- Admin css -->
  <link rel="stylesheet" href="../../assets/css/Admin.css" />

  <!-- font link -->
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Cantora+One&display=swap" rel="stylesheet" />
  <title>Admin Page - create user</title>
</head>

<body>
<?php include(ROOT_PATH . '/app/includes/adminHeader.php') ?>

  <!-- page wrapper -->

  <div class="Admin-wrapper">

    <!-- left side -->
    <?php include(ROOT_PATH . '/app/includes/adminSide.php') ?>
    <!-- //left side -->

    <!-- Admin content -->
    <div class="Admin-content">
      <div class="button-group">
        <a href="create.php" class="btn btn-big">Add user</a>
        <a href="index.php" class="btn btn-big">Manage users</a>
      </div>

      <div class="content">
        <h2 class="page-title">Add user</h2>
        <form action="create.php" method="post">
      <?php include(ROOT_PATH . '/app/Helpers/formErrors.php'); ?>
          <div>
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username ?>" class="text-input">
          </div>
          <div>
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email ?>" class="text-input">
          </div>
          <div>
            <label>Password</label>
            <input type="password" name="password" value="<?php echo $password ?>" class="text-input">
          </div>
          <div>
            <label>Password Comfirmation</label>
            <input type="password" name="passwordconf" value="<?php echo $password ?>" class="text-input">
          </div>
          <div>
           <?php if(isset($_POST['admin']) && $admin === 1): ?>
            <label>
              <input type="checkbox" name="admin" checked>Admin
            </label>
            <?php else: ?>
            <label>
              <input type="checkbox" name="admin" >Admin
            </label>
           <?php endif; ?>
          </div>
          <div>
            <button type="submit" name="reg-submit" class="btn btn-big">Add user</button>
          </div>
        </form>
      </div>
    </div>
    <!--// Admin content -->

  </div>

    <!-- //page wrapper -->


    <!-- font cdn -->
    <script src="https://use.fontawesome.com/9bf3da6d6d.js"></script>
    <!-- jquery cdn -->
    <script src="../../assets/js/jquery-3.6.0.min.js"></script>

    <!-- ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

    <!-- slick -->
    <script type="text/javascript" src="../../assets/js/slick.min.js"></script>

    <!-- javascript link -->
    <script src="../../assets/js/script.js"></script>
</body>

</html>