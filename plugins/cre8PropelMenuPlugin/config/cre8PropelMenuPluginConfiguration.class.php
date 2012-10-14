<?php

/**
 * cre8PropelMenuPlugin configuration.
 * 
 * @package     cre8PropelMenuPlugin
 * @subpackage  config
 * @author      Bogumil Wrona <b.wrona@cre8newmedia.com>
 * @version     SVN: $Id: PluginConfiguration.class.php 17207 2009-04-10 15:36:26Z Kris.Wallsmith $
 */
class cre8PropelMenuPluginConfiguration extends sfPluginConfiguration
{
  const VERSION = '1.0.0-DEV';

  /**
   * @see sfPluginConfiguration
   */
  public function initialize()
  {
    if (sfConfig::get('app_cre8_menu_plugin_routes_register', true))
    {
      if(in_array('cre8MenuAdmin', sfConfig::get('sf_enabled_modules', array()))) {
        $this->dispatcher->connect('routing.load_configuration', array('cre8MenuRouting', 'addRouteForAdminMenu'));
      }

      if(in_array('cre8MenuTypeAdmin', sfConfig::get('sf_enabled_modules', array()))) {
        $this->dispatcher->connect('routing.load_configuration', array('cre8MenuRouting', 'addRouteForAdminMenuType'));
      }
    }

  }

}
