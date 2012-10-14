<?php if($sf_user->hasFlash('error')): ?>
	<div class="error"><?php echo $sf_user->getFlash('error'); ?></div>
<?php endif; ?>