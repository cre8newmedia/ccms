<?php

abstract class Basecre8PhpMailerNewsletterComponents extends sfComponents
{
  public function executeSubscribe(sfWebRequest $request) {
    $this->form = new SubscribeToNewsletterForm();
    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter('newsletter'));
      if($this->form->isBound() && $this->form->isValid()) {
        $values = $this->form->getValues();
        $this->getUser()->setFlash('notice', 'Thank you for subscribing.');
        $this->addEmailToMailingList($values['email']);
      }
    }
  }

  public function addEmailToMailingList($email) {
    if(sfConfig::get('sf_environment') == 'prod') {
      PhpmlMembersPeer::addEmailToPhpMailerDatabase($email);
    }
  }

}