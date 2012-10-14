<?php if(count($cre8MenuContents)): ?>

    <?php foreach($cre8MenuContents as $cre8MenuContent): ?>
  <li><a href="<?php echo url_for('@homepage?slug=' . $cre8MenuContent->getSlug())?>" class="<?php echo ( ($cre8MenuContent->getSlug() == $sf_params->get('slug')) ? 'selected' : ''); ?>" ><?php echo $cre8MenuContent; ?></a></li>
    <?php endforeach; ?>

<?php endif; ?>
