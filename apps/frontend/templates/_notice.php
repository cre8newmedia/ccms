<?php if($sf_user->hasFlash('notice')): ?>
	<div class="notice"><?php echo $sf_user->getFlash('notice'); ?></div>
<?php endif; ?>