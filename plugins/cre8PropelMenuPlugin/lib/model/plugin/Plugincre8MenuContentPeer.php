<?php

class Plugincre8MenuContentPeer extends Basecre8MenuContentPeer
{
  static public function getBySlug($slug)
  {
    if(!$slug) return false;
    
    $c = new Criteria();
    $c->add(self::SLUG, $slug);
    return self::doSelectOne($c);
  }
}
