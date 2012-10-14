<?php

class cre8FlashSlider2Routing
{
  static public function listenToRoutingLoadConfigurationEvent(sfEvent $event)
  {
    $r = $event->getSubject();
    $r->prependRoute('get_cre8_flash_slider2', new sfRoute('/get_cre8_flash_slider2', array('module' => 'cre8FlashSlider2', 'action' => 'index')));
  }
  
  static public function addRouteForAdmin(sfEvent $event)
  {
    $r = $event->getSubject();
    $r->prependRoute('cre8_flash_slider2', new sfPropelRouteCollection(array(
      'name'                 => 'cre8_flash_slider2',
      'model'                => 'Cre8FlashSlider2',
      'module'               => 'cre8FlashSlider2Admin',
      'prefix_path'			 => 'cre8FlashSlider2Admin',
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));
   
  }
  
}