Hi <?php echo $sfGuardUser->getProfile()->getFirstName(); ?>,<br />
<br />
Thank you for subscribing to Fabric &amp; Texture<br />
<br />
Click <?php echo link_to('here', url_for('@sf_guard_signin'), true); ?> to login