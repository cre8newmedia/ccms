<?php

/**
 * cre8PhpBBPlugin configuration.
 * 
 * @package     cre8PhpBBPlugin
 * @subpackage  config
 * @author      Bogumil Wrona <b.wrona@cre8newmedia.com>
 * @version     SVN: $Id: PluginConfiguration.class.php 17207 2009-04-10 15:36:26Z Kris.Wallsmith $
 */
class cre8PhpBBPluginConfiguration extends sfPluginConfiguration
{
  const VERSION = '1.0.0-DEV';

  /**
   * @see sfPluginConfiguration
   */
  public function initialize()
  {
    $this->dispatcher->connect( 'task.cache.clear', array('prestaForumFactory', 'listenToClearCacheEvent') );
    $this->dispatcher->connect( 'propel.filter_phing_args', array( 'cre8PhpBBEventListener', 'listenToInsertSqlEvent' ) );
  }
}
