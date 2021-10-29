<?php include('../../path.php'); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php");
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
  <title>Admin section - users</title>
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
      <h2 class="page-title">Manage users</h2>
      
      <?php include(ROOT_PATH . "/app/includes/loginmessage.php"); ?>
      <table>
        <thead>
          <th>sn</th>
          <th>username</th>
          <th>email</th>
          <th colspan="2">Actions</th>
        </thead>

        <?php foreach ($adminUser as $key => $user): ?>
          <tr>
          <td><?php echo $key + 1 ?></td>
          <td><?php echo $user['username'] ?></td>
          <td><?php echo $user['email'] ?></td>
          <td ><a href="edit.php?edit_id=<?php echo $user['id'] ?>" class="edit">edit</a></td>
          <td><a href="index.php?delete_id=<?php echo $user['id'] ?>" class="delete">delete</a></td>
        </tr>
        <?php endforeach; ?>  


      </table>
    </div>
    </div>
    <!--// Admin content -->

  </div>

    <!-- //page wrapper -->


    <!-- font cdn -->
    <script src="https://use.fontawesome.com/9bf3da6d6d.js"></script>
    <!-- jquery cdn -->
    <script src="/assets/js/jquery-3.6.0.min.js"></script>

    <!-- ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

    <!-- slick -->
    <script type="text/javascript" src="/assets/js/slick.min.js"></script>

    <!-- javascript link -->
    <script src="../../assets/js/script.js"></script>
</body>

</html>