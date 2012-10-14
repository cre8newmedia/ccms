<div class="box_subscribe">
  <h3>Subscribe to our mailing list</h3>
  <p>Please enter your email below to subscribe to our mailing list</p>

  <?php include_partial('global/form_essentials', array('form' => $form)); ?>

  <form class="form_subscribe" method="post" action="">
    <?php echo $form->renderHiddenFields(); ?>
    <fieldset>
      <?php echo $form['email']->render(array('class' => 'form_input_txt_subscribe')); ?>
      <input type="image" src="/cre8PhpMailerNewsletterPlugin/images/btn_subscribe.gif" />
      <?php echo $form['email']->renderError(); ?>
    </fieldset>
  </form>
</div>