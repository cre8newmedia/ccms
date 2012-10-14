<?php if(sfConfig::get('app_cre8_news_manage_categories', true)): ?>
	<?php echo link_to('Manage Categories', url_for('@cre8_news_category')); ?>
<?php endif; ?>