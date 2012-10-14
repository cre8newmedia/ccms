<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfPropel15Plugin');
    $this->enablePlugins('sfGuardPlugin');
    $this->enablePlugins('sfProtoculousPlugin');
    $this->enablePlugins('sfJqueryReloadedPlugin');
    $this->enablePlugins('sfTaskExtraPlugin');
    $this->enablePlugins('sfDateTime2Plugin');
    $this->enablePlugins('sfAdminDashPlugin');
    $this->enablePlugins('prestaForumConnectorPlugin');
    $this->enablePlugins('sfThumbnailPlugin');
    $this->enablePlugins('sfWebBrowserPlugin');
    $this->enablePlugins('sfFeed2Plugin');
    $this->enablePlugins('sfGoogleAnalyticsPlugin');
    $this->enablePlugins('sfCsvPlugin');
    $this->enablePlugins('sfFacebookConnectPlugin');

    $this->enablePlugins('cre8FormPlugin');
    $this->enablePlugins('cre8HelpersPlugin');
    $this->enablePlugins('cre8PropelMenuPlugin');
    $this->enablePlugins('cre8PropelNewsPlugin');
    $this->enablePlugins('cre8SwfObjectPlugin');
    $this->enablePlugins('cre8ToolkitPlugin');
    $this->enablePlugins('cre8FlashSlider2Plugin');
    $this->enablePlugins('cre8SslPlugin');
    $this->enablePlugins('cre8BasketPlugin');
    $this->enablePlugins('cre8PropelMailingListPlugin');
    $this->enablePlugins('cre8ApplicationPlugin');
    $this->enablePlugins('cre8PhpMailerNewsletterPlugin');

    // OPTIONAL PLUGINS:

//    $this->enablePlugins('cre8PhpBBPlugin');

    $this->dispatcher->connect('sf_guard.user.save', array('sfGuardListener', 'listenTosfGuardUserSaveEvent'));
    
  }
}
