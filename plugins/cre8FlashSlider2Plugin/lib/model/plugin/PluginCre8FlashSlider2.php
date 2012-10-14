<?php

class PluginCre8FlashSlider2 extends BaseCre8FlashSlider2
{
  public function __toString()
  {
    return $this->getName();
  }
  
  public function delete(PropelPDO $con = null)
  {
    $ret = parent::delete($con);
    Cre8FlashSlider2XMLGenerator::updateAndSave();
    return $ret;
  }
  
  public function save(PropelPDO $con = null)
  {
    $ret = parent::save($con);
    Cre8FlashSlider2XMLGenerator::updateAndSave();
    return $ret;
  }
  
}
