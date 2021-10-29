<?php include('../../path.php'); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php");  
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
  <title>Admin Page - manage post</title>
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
        <a href="create.php" class="btn btn-big">Add post</a>
        <a href="index.php" class="btn btn-big">Manage post</a>
      </div>

      <div class="content">
      <h2 class="page-title">Manage posts</h2>
      <?php include(ROOT_PATH . "/app/includes/loginmessage.php"); ?>
      <table>
        <thead>
          <th>sn</th>
          <th>title</th>
          <th>Author</th>
          <th colspan="3">Actions</th>
        </thead>
        <?php foreach ($posts as $key => $post):?>
        <tr>
          <td><?php echo $key + 1; ?></td>
          <td><?php echo $post['tittle']; ?></td>
          <td>keshie</td>
          <td ><a href="edit.php?id=<?php echo $post['id']; ?>" class="edit">edit</a></td>
          <td><a href="?delete_id=<?php echo $post['id'] ?>" class="delete">delete</a></td>
          <?php if ($post['published']): ?>
          <td><a href="?published=0&p_id=<?php echo $post['id'] ?>" class="unpublish">unpublish</a></td>
          <?php else: ?>
          <td><a href="?published=1&p_id=<?php echo $post['id'] ?>" class="publish">publish</a></td>
          <?php endif; ?>
        </tr>
        <?php endforeach; ?>
        <!-- <tr>
          <td>2</td>
          <td>this is my second title</td>
          <td>Keshie</td>
          <td ><a href="#" class="edit">edit</a></td>
          <td><a href="#" class="delete">delete</a></td>
          <td><a href="#" class="publish">publish</a></td>
        </tr> -->
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