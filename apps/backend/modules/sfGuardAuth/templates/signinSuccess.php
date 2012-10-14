<?php
include_stylesheets_for_form($form);
include_javascripts_for_form($form);

$context = sfContext::getInstance();
$request = $context->getRequest();

?>



<?php if($form->hasGlobalErrors()): ?>
<ul class="error_list">
    <?php foreach($form->getGlobalErrors() as $name => $error): ?>
  <li><?php echo $error; ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>





  <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
    <?php echo $form->renderHiddenFields(); ?>
<div class="login_holder">
    <ul class="login_holder_list">
      <li style="padding-bottom: 10px;">
        <label><img src="/images/icon_user.png" alt="username"/></label>
        <?php echo $form['username']->render(array('class' => ''));?>
        <?php echo $form['username']->renderError() ?>
      </li>
      <li style="padding-bottom: 15px; "> 
        <label><img src="/images/icon_password.png" alt="password"/></label>
        <?php echo $form['password']->render(array('class' => ''));?>
        <?php echo $form['password']->renderError() ?>
      </li>
      <li style="padding-left: 15px; ">
        <div class="remember_holder">
          <?php echo $form['remember']->render(array('class' => ''));?>
          <label>Remember Me</label>
          <?php echo $form['remember']->renderError() ?>
        </div>
        <div class="btn_frogPass">
          <!--<a href="#">Forgotten Password</a>-->
        </div>
      </li>
    </ul>


    <div class="btn_login_holder">
      <input type="image" src="/images/btn_login.png" />
    </div>
 </div>
  </form>

