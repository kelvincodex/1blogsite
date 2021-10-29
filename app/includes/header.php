
    <div id="navbar">
      <h2 class="logo"><a href="<?php echo BASE_URL . '/index.php'; ?>"><span>Keshie's Blog</span></h2>
      <i class="fa fa-bars menu-toggle"></i></a>
      <nav>
        <ul class="nav">
          <li><a href="<?php echo(BASE_URL . '/index.php');?>">Home</a></li>
          <li><a href="#">About us</a></li>
          <li><a href="#">Service</a></li>

          <?php if (isset($_SESSION['id'])): ?>
            <li>
            <a href="#">
              <i class="fa fa-user"></i>
             <?php echo($_SESSION['username']); ?>
              <i class="fa fa-chevron-down"></a></i>
            <ul>
            <?php if($_SESSION['admin'] ):?>
              <li><a href="<?php echo BASE_URL . '/admin/Dashboard.php' ?>">Dashboard</a></li>
              <li><a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout">Logout</a></li>

              
              <?php else: ?>
                <li><a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout">Logout</a></li>
              <?php endif; ?>
            </ul>
          </li>
         <?php else: ?>
            <li><a href="<?php echo BASE_URL . '/register.php'; ?>">signup</a> </li>
            <li><a href="<?php echo BASE_URL . '/login.php'; ?>">login</a> </li>
         <?php endif; ?>


        </ul>
      </nav>
    </div>


