<?php

class SubscribeToNewsletterForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'email' => new sfWidgetFormInputText()
    ));

    $this->setValidators(array(
      'email' => new sfValidatorEmail()
    ));

    $this->widgetSchema->setNameFormat('newsletter[%s]');

  }
}