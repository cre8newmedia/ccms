<?php

class cre8MenuRouting
{
  /**
   * Listens to the routing.load_configuration event.
   *
   * @param sfEvent An sfEvent instance
   */
  static public function addRouteForAdminMenu(sfEvent $event)
  {
    $r = $event->getSubject();

    $r->prependRoute('cre8_menu_content', new sfPropel15RouteCollection(array(
      'name'                 => 'cre8_menu_content',
      'model'                => 'Cre8MenuContent',
      'module'               => 'cre8MenuAdmin',
      'prefix_path'			 => 'menu-content-admin',
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));

  }

  static public function addRouteForAdminMenuType(sfEvent $event)
  {
    $r = $event->getSubject();

    $r->prependRoute('cre8_menu_type', new sfPropel15RouteCollection(array(
      'name'                 => 'cre8_menu_type',
      'model'                => 'Cre8MenuType',
      'module'               => 'cre8MenuTypeAdmin',
      'prefix_path'			 => 'menu-type-admin',
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));

  }

}
