<?php

class Cre8News extends PluginCre8News 
{
  public function __toString()
  {
    return $this->getTitle();
  }
}
