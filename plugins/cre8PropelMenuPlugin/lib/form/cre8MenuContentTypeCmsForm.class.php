<?php


class cre8MenuContentTypeCmsForm extends Basecre8MenuContentTypeCmsForm
{
  public function configure()
  {
    $this->setWidget('content', new sfWidgetFormFCKEditor(array('width' => 650, 'height' => 450), array()));
  }
}
