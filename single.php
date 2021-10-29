<?php 
include("path.php");
include(ROOT_PATH . "/app/controllers/posts.php");

if (isset($_GET['id'])) {
  $post = selectOne($table, ['id' => $_GET['id']]);
}
$topics = selectAll('topics');
$posts = selectAll($table, ['published' => 1]);

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
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Cantora+One&display=swap" rel="stylesheet" />
  <title><?php echo $post['tittle'] . " | keshie" ?></title>
</head>

<body>
  
  <?php include(ROOT_PATH . "/app/includes/header.php") ?>

  <!-- page wrapper -->
  <div class="page-wrapper">
    <!-- post content -->
    <div class="content clearfix">
      <div class="main-content single">
        
        <h1 class="post-title"><?php echo $post['tittle'] ?></h1>
      
          <?php echo html_entity_decode($post['body']); ?>
        
      </div>

      <div class="slidebar single">
        <div class="post-pop">
        <h2 class="section-title">Popular Posts</h2>
        <?php foreach($posts as $post): ?>
        <div class="post clearfix">
          <img src="<?php echo BASE_URL . "/assets/images/" . $post['image'] ?>" alt="" />
          <a href="#">
            <h3><?php echo $post['tittle'] ?></h3>
          </a>
        </div>
        <?php endforeach; ?>
        </div>

        <div class="section text just">
          <h2 class="section-search">Topics</h2>
          <ul>
            <?php foreach($topics as $topic): ?>
            <li><a href="<?php echo BASE_URL . "/index.php?t_id=" . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name'] ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- //post content -->

  <!-- footer -->
    <?php include ROOT_PATH . "/app/includes/footer.php" ?>
  <!-- //footer -->
  <!-- //post wrapper -->
  <!-- font cdn -->
  <script src="https://use.fontawesome.com/9bf3da6d6d.js"></script>
  <!-- jquery cdn -->
  <script src="/assets/js/jquery-3.6.0.min.js"></script>

  <!-- slick -->
  <script type="text/javascript" src="assets/js/slick.min.js"></script>

  <!-- javascript link -->
  <script src="assets/js/script.js"></script>
</body>

</html>