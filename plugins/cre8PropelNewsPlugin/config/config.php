<?php

if (sfConfig::get('app_cre8_news_plugin_routes_register', true) && in_array('cre8NewsAdmin', sfConfig::get('sf_enabled_modules', array())))
{
  $this->dispatcher->connect('routing.load_configuration', array('cre8NewsRouting', 'addRouteForAdminNews'));
}

if (sfConfig::get('app_cre8_news_plugin_routes_register', true) && in_array('cre8_news_category', sfConfig::get('sf_enabled_modules', array())))
{
  $this->dispatcher->connect('routing.load_configuration', array('cre8NewsRouting', 'addRouteForAdminCategories'));
}
