<?php include('../../path.php');

 include(ROOT_PATH . "/app/controllers/posts.php");
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
  <title>Admin Page - edit post</title>
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
      <h2 class="page-title">edit posts</h2>
      
      <?php include(ROOT_PATH . '/app/Helpers/formErrors.php'); ?>
      
      <form action="edit.php" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $id ?>" name="id">
      <div>
          <label>title</label>
          <input type="text" value="<?php echo $tittle ?>" name="tittle" class="text-input">
        </div>
        <div>
          <label>body</label>
          <textarea name="body" id="body"><?php echo $body ?></textarea>
        </div>
        <div>
          <label>Images</label>
          <input type="file" name="image"  class="text-input">
        </div>
        <div>
          <label>Topic</label>
          <select name="topic_id" class="text-input">
            <option value=""></option>

            <?php foreach ($topics as $key => $topic): ?>
            <?php if(!empty($topic_id) && $topic_id == $topic['id']):  ?>
              <option selected value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>

            <?php else: ?>
              <option value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
            <?php endif; ?>  
            <?php endforeach; ?>
          </select>
        </div>
        <div>
        <?php if(empty($published)): ?>
        <label>
        <input type="checkbox" name="published"> publish
        </label>
        <?php else: ?>
        <label>
        <input type="checkbox" name="published" checked> publish
        </label>
        <?php endif; ?>
        </div>
        <div>
          <button type="submit" name="edit-post" class="btn btn-big">update post</button>
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