 <?php if(count($errors) >0): ?>
  <div class="msg error success">
  <?php foreach($errors as $error): ?>
    <h1><?php echo $error ?></h1>
  <?php endforeach; ?>  
  </div>
  <?php endif; ?>