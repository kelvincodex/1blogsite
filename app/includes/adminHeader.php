<div id="navbar">
<a href="<?php echo(BASE_URL . '/index.php') ?>"><h2 class="logo"><span>Keshie's</span>Blog</h2></a>
<i class="fa fa-bars menu-toggle"></i>
<nav>
  <ul class="nav">
    <?php if(isset($_SESSION['id'])) : ?>
    <li>
      <a href="#">
        <i class="fa fa-user"></i>
        <?php echo $_SESSION['username'] ?>
        <i class="fa fa-chevron-down"></i>
      </a>
      <ul>
        <li><a href="<?php echo BASE_URL . '/logout.php' ?>" class="logout">Logout</a></li>
      </ul>
    </li>
    <?php endif; ?>
  </ul>
</nav>
</div>


