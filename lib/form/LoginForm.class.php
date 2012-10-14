<?php

class LoginForm extends sfGuardFormSignin 
{
  public function configure()
  {
    parent::configure();
    $this->validatorSchema->setPostValidator(new sfGuardValidatorUser($options = array('throw_global_error' => true)));
  }
}