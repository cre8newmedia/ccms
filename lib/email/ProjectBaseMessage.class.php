<?php

class ProjectBaseMessage extends Swift_Message
{
  protected $loggedInGuardUser = null;

  public function __construct($subject = null, $body = null)
  {
    if(sfContext::getInstance()->getUser()->isAuthenticated()) {
      $this->loggedInGuardUser = sfContext::getInstance()->getUser()->getGuardUser();
    }
    sfProjectConfiguration::getActive()->loadHelpers("Partial");
    $subject = 'CRE8 CMS: ' . $subject;

    $body .= <<<EOF
--

Email sent by Cre8 CMS application
EOF
    ;

    parent::__construct($subject, $body);

    // set all shared headers
    $this->setFrom(array(sfConfig::get('app_from_email', 'b.wrona@cre8newmedia.com') => sfConfig::get('app_company_name', 'CRE8')));
    $this->setTo(array(sfConfig::get('app_company_email', 'b.wrona@cre8newmedia.com') => sfConfig::get('app_company_name', 'CRE8')));

  }

  public function send() {
    sfContext::getInstance()->getMailer()->send($this);
  }

}