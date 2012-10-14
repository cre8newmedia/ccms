<?php

class AdminsfGuardUserProfileFormFilter extends sfGuardUserProfileFormFilter 
{
  public function configure()
  {
    parent::configure();
    
    $this->setWidgets(array(
      'first_name'                     => new sfWidgetFormFilterInput(),
      'last_name'                      => new sfWidgetFormFilterInput()
    ));

    $this->setValidators(array(
      'first_name'                     => new sfValidatorPass(array('required' => false)),
      'last_name'                      => new sfValidatorPass(array('required' => false))
    ));
  }
  
  public function getFields()
  {
    return array(
      'first_name'                     => 'Text',
      'last_name'                      => 'Text'
    );
  }
}