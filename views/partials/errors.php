<?php if(isset($errors)): ?>
<?php foreach($errors as $e): ?>
<div class="alert alert-danger" role="alert">
  <?php echo $e ?>
</div>
<?php endforeach; ?>
<?php else: ?>
  <div class="alert alert-danger" role="alert">
  <?php echo "Error !"; ?>
</div>
<?php endif; ?>