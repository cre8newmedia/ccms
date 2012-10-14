<?php echo $form->renderFormTag(url_for('sf_guard_signin'), $attributes = array()); ?>
<?php include_partial('global/form_essentials', array('form' => $form)); ?>
<ul>
<?php echo $form->render(array('username' => array('class' => 'email'))) ?>
</ul>
<input type="submit" value="Submit" />
<?php echo "</form>"; ?>
