<?php

abstract class Basecre8MailingListComponents extends sfComponents
{
  public function executeSubscribe(sfWebRequest $request)
  {
    $this->form = new cre8MailingListForm();
    
  }
}
