<?php

class Cre8NewsCategory extends BaseCre8NewsCategory
{
  public function __toString()
  {
    return $this->getName();
  }
}
