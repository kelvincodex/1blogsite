
   <?php if(isset($_SESSION['message'])): ?>
    <div class="msg  <?php echo($_SESSION['type']) ?>">
    <h2> <?php echo($_SESSION['message']) ?> </h2>
    </div>
    <?php 
    unset($_SESSION['message']);
    unset($_SESSION['type']);
    ?>
    <?php endif; ?>

