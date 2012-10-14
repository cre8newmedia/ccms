<?php
  include_stylesheets_for_form($form);
  include_javascripts_for_form($form);
?>

<?php include_partial('global/notice'); ?>
<?php include_partial('global/error'); ?>

<?php if($form->hasGlobalErrors()): ?>
    <ul class="error_list">
    	<?php foreach($form->getGlobalErrors() as $name => $error): ?>
    	<li><?php echo $error; ?></li>
    	<?php endforeach; ?>
    </ul>
<?php endif; ?>