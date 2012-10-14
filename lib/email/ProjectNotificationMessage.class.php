<?php

class ProjectNotificationMessage extends ProjectBaseMessage
{
  public function __construct($subject = null, $body = null)
  {
    $subject = $subject . ' Notification';
    parent::__construct($subject, $body);
    
    // specific headers, attachments, ...
//    $this->attach('...');
  }
}