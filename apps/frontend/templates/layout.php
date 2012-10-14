<?php use_helper('sfFacebookConnect'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="http://<?php echo sfContext::getInstance()->getRequest()->getHost(); ?>/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <ul class="menu_list">
      <?php include_component('content', 'menu'); ?>
    </ul>
    <?php echo $sf_content ?>
    <?php echo include_facebook_connect_script() ?>
  </body>
</html>
