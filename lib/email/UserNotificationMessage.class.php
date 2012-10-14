<?php

class UserNotificationMessage extends ProjectNotificationMessage
{
  protected $sfGuardUser = null;

  public function  __construct(sfGuardUser $sfGuardUser, $subject = null, $body = null) {
    parent::__construct($subject, $body);
    $this->sfGuardUser = $sfGuardUser;
    $this->setTo($this->getUser()->getUsername(), $this->getUser()->getProfile()->getFullName());
  }

  public function getUser() {
    return $this->sfGuardUser;
  }

  public function welcomeMessage() {
    $this->setSubject('Welcome');
    $this->setBody(get_partial('cre8Email/welcomeMessage', array('sfGuardUser' => $this->getUser())), 'text/html');
  }
}