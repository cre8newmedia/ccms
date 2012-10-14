<?php

class UniversalUserForm extends BaseUniversalUserForm 
{
	public function configure()
	{
    	parent::configure();
    	$this->validatorSchema['username'] = new sfValidatorEmail(array('required' => true));
    	$this->widgetSchema->setLabel('username', 'Email');
	}
}