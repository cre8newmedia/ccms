<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardRouting.class.php 13346 2008-11-25 19:10:17Z FabianLange $
 */
class cre8NewsRouting
{
  
  /**
   * Listens to the routing.load_configuration event.
   *
   * @param sfEvent An sfEvent instance
   */
  static public function addRouteForAdminNews(sfEvent $event)
  {
    $r = $event->getSubject();
    
    $r->prependRoute('cre8_news', new sfPropelRouteCollection(array(
      'name'                 => 'cre8_news',
      'model'                => 'Cre8News',
      'module'               => 'cre8NewsAdmin',
      'prefix_path'			 => 'news',
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));
   
  }
  
  
  /**
   * Listens to the routing.load_configuration event.
   *
   * @param sfEvent An sfEvent instance
   */
  static public function addRouteForAdminCategories(sfEvent $event)
  {
    $r = $event->getSubject();
    
    $r->prependRoute('cre8_news_category', new sfPropelRouteCollection(array(
      'name'                 => 'cre8_news_category',
      'model'                => 'Cre8NewsCategory',
      'module'               => 'cre8_news_category',
      'prefix_path'			 => 'newsCats',
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));
   
  }
  

}
