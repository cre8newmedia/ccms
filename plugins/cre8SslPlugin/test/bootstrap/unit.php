<?php

if (!isset($_SERVER['SYMFONY']))
{
  throw new RuntimeException('Could not find symfony core libraries.');
}

require_once $_SERVER['SYMFONY'].'/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

$configuration = new sfProjectConfiguration(getcwd());
require_once $configuration->getSymfonyLibDir().'/vendor/lime/lime.php';

require_once dirname(__FILE__).'/../../config/cre8SslPluginConfiguration.class.php';
$plugin_configuration = new cre8SslPluginConfiguration($configuration, dirname(__FILE__).'/../..');
