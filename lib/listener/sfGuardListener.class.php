<?php

class sfGuardListener {

  static public function listenTosfGuardUserSaveEvent(sfEvent $event) {
    if($event->getSubject() instanceof sfGuardUser) {
      
      prestaForumFactory::getForumConnectorInstance()->synchUser($event->getSubject()->getId());
      if($event->getSubject()->isNew()) {
        self::sfGuardUserInsert($event->getSubject());
      } else {
        self::sfGuardUserUpdate($event->getSubject());
      }
    }    
  }

  static public function sfGuardUserInsert(sfGuardUser $user) {
//    $user->getProfile()->setFirstName($user->getProfile()->getFirstName() . '_I');
  }

  static public function sfGuardUserUpdate(sfGuardUser $user) {
//    $user->getProfile()->setFirstName($user->getProfile()->getFirstName() . '_C');
  }


}
?>
