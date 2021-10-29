<?php include("path.php");
include(ROOT_PATH . "/app/controllers/posts.php");
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
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cantora+One&display=swap" rel="stylesheet" >

    <title>First Blog Page</title>
  </head>
  <body>

    <?php include( ROOT_PATH . "/app/includes/header.php"); ?>
    <?php include( ROOT_PATH . "/app/includes/loginmessage.php"); ?>

    <?php 
    $posts = array();
    $postTitle = 'Recent Post';

    if (isset($_GET['t_id'])) {
      $postTitle = 'Search Result For "'. $_GET['name'] . '"';
      $posts = getTopicId($_GET['t_id']);
    }
    
    else if(isset($_POST['search'])){
      $postTitle = 'Search Result For "'. $_POST['search'] . '"';
      $posts = search($_POST['search']);
    } else{
      
      $posts = getPublished('posts', ['published' => 1]);
    }
    ?>

    
    <!-- page wrapper -->
  <div class="page-wrapper">
      

    <!-- post slider -->
    <div class="post-wrapper">
      <h2>Trending post</h2>
      <i class="fa fa-chevron-left prev"></i>
      <i class="fa fa-chevron-right next"></i>
      <div class="post-slider">


      <?php foreach($posts as $post): ?>
        <div class="post">
          <img src="<?php echo( BASE_URL . "/assets/images/" . $post['image']); ?>" alt="" />
          <div class="post-info">
            <h4>
              <a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['tittle']; ?></a>
            </h4>
            <i class="fa fa-user"> <?php echo $post['username'] ?></i>
            &nbsp;
            <i class="fa fa-calendar"><?php echo date('F j,Y', strtotime($post['created_at'])) ?></i>
          </div>
        </div>
       <?php endforeach; ?>



      </div>
    </div>
    <!-- //post slider -->
    <!-- post content -->
    <div class="content clearfix">
      <div class="main-content">
        <h1 class="recent-post-title"><?php echo $postTitle ?></h1>

        <?php foreach($posts as $post): ?>

        <div class="post clearfix">
          <img src="<?php echo BASE_URL . "/assets/images/" . $post["image"] ?>" alt="" class="post-image" />
          <div class="post-preview">
            <a href="single.php?id=<?php echo $post['id']; ?>"><h2><?php echo $post['tittle'] ?></h2></a>
            <i class="fa fa-user"> <?php echo $post['username'] ?></i>
            &nbsp;
            <i class="fa fa-calender"><?php echo date('F j,Y', strtotime($post['created_at'])) ?></i>
            <p class="preview-text"><?php echo html_entity_decode(substr($post['body'], 0,50) . '...') ?></p>
            <a href="single.php?di=<?php echo $post['id'] ?>" class="btn">Read more</a>
          </div>
        </div>
        <?php endforeach; ?>



      <div class="slidebar">
        <div class="section search">
          <h2 class="section-title">Search</h2>
          <form action="index.php" method="post">
            <input type="text" name="search" class="text-input" placeholder="Search....">
          </form>
        </div>

        <div class="section text">
          <h2 class="section-search">Topics</h2>
          <ul>
          <?php foreach ($topics as $key => $topic): ?>
            <li><a href="<?php echo BASE_URL . "/index.php?t_id=" . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name'] ?></a></li>

            <?php endforeach; ?>
            <!-- <li><a href="#">Hot Gists</a></li>
            <li><a href="#">Musics</a></li>
            <li><a href="#">Bible</a></li>
            <li><a href="#">Entertanment</a></li>
            <li><a href="#">Writing</a></li>
            <li><a href="#">Politics</a></li>
            <li><a href="#">Novel</a></li>
            <li><a href="#">Drama</a></li> -->
          </ul>
        </div>
      </div>
    </div>
  </div>
    <!-- //post content -->

    <!-- footer -->
     <?php include ROOT_PATH . "/app/includes/footer.php"; ?>
  <!-- //footer -->
  <!-- //post wrapper -->
  <!-- font cdn -->
  <script src="https://use.fontawesome.com/9bf3da6d6d.js"></script>
  <!-- jquery cdn -->
  <script src="assets/js/jquery-3.6.0.min.js"></script>

  <!-- slick -->
  <script type="text/javascript" src="assets/js/slick.min.js"></script>

  <!-- javascript link -->
  <script src="assets/js/script.js"></script>
</body>

</html>
