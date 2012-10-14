<?php

// this check prevents access to debug front controllers that are deployed by accident to production servers.
// feel free to remove this, extend it or make something more sophisticated.
if (!in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1', '127.0.1.1', '::1', '192.168.2.50', '192.168.2.60', '192.168.2.70', '192.168.2.80', '192.168.2.90')))
{
  die('You are not allowed to access this file. Check '.basename(__FILE__).' for more information. Your IP address is: ' . $_SERVER['REMOTE_ADDR']);
}

require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'dev', true);
if(!defined('SYMFONY_STOP_INSTANCE_DISPATCH'))
{
  sfContext::createInstance($configuration)->dispatch();
}