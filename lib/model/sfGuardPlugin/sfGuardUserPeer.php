<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardUserPeer.php 7634 2008-02-27 18:01:40Z fabien $
 */
class sfGuardUserPeer extends PluginsfGuardUserPeer
{



  static public function doSelectBasedOnPrivilageGroup(Criteria $criteria, PropelPDO $con = null) {
    
    $sfUser = sfContext::getInstance()->getUser();

    $sfGuardUserGroupJoin = null;
    foreach($criteria->getJoins() as $join) {
      $leftColumn = $join->getLeftColumn();
      $rightColumn = $join->getRightColumn();
      if($leftColumn = sfGuardUserGroupPeer::USER_ID && $rightColumn = sfGuardUserPeer::ID) {
        $sfGuardUserGroupJoin = $join;
      }
    }

    if($sfUser->isAuthenticated()) {

      $sfGuardUser = $sfUser->getGuardUser();

      if($sfGuardUserGroupJoin) {
        $criterion = $criteria->getCriterion(sfGuardUserGroupPeer::GROUP_ID);
        if($sfGuardUser->hasGroup('moderator')) {
          $criterion->addAnd($criteria->getNewCriterion(sfGuardUserGroupPeer::GROUP_ID, 2, Criteria::GREATER_EQUAL));
        }
        if($sfGuardUser->hasGroup('publisher')) {
          $criterion->addAnd($criteria->getNewCriterion(sfGuardUserGroupPeer::GROUP_ID, 3, Criteria::GREATER_EQUAL));
        }
      } else {
        $criteria->addJoin(self::ID, sfGuardUserGroupPeer::USER_ID, Criteria::LEFT_JOIN);
        if($sfGuardUser->hasGroup('moderator')) {
          $criteria->add(sfGuardUserGroupPeer::GROUP_ID, 2, Criteria::GREATER_EQUAL);
        }
        if($sfGuardUser->hasGroup('publisher')) {
          $criteria->add(sfGuardUserGroupPeer::GROUP_ID, 3, Criteria::GREATER_EQUAL);
        }
      }
    }
    return self::doSelect($criteria, $con);
  }

  static public function doCountBasedOnPrivilageGroup(Criteria $criteria, PropelPDO $con = null) {
    $sfUser = sfContext::getInstance()->getUser();

    $sfGuardUserGroupJoin = null;
    foreach($criteria->getJoins() as $join) {
      $leftColumn = $join->getLeftColumn();
      $rightColumn = $join->getRightColumn();
      if($leftColumn = sfGuardUserGroupPeer::USER_ID && $rightColumn = sfGuardUserPeer::ID) {
        $sfGuardUserGroupJoin = $join;
      }
    }

    if($sfUser->isAuthenticated()) {

      $sfGuardUser = $sfUser->getGuardUser();

      if($sfGuardUserGroupJoin) {
        $criterion = $criteria->getCriterion(sfGuardUserGroupPeer::GROUP_ID);
        if($sfGuardUser->hasGroup('moderator')) {
          $criterion->addAnd($criteria->getNewCriterion(sfGuardUserGroupPeer::GROUP_ID, 2, Criteria::GREATER_EQUAL));
        }
        if($sfGuardUser->hasGroup('publisher')) {
          $criterion->addAnd($criteria->getNewCriterion(sfGuardUserGroupPeer::GROUP_ID, 3, Criteria::GREATER_EQUAL));
        }
      } else {
        $criteria->addJoin(self::ID, sfGuardUserGroupPeer::USER_ID, Criteria::LEFT_JOIN);
        if($sfGuardUser->hasGroup('moderator')) {
          $criteria->add(sfGuardUserGroupPeer::GROUP_ID, 2, Criteria::GREATER_EQUAL);
        }
        if($sfGuardUser->hasGroup('publisher')) {
          $criteria->add(sfGuardUserGroupPeer::GROUP_ID, 3, Criteria::GREATER_EQUAL);
        }
      }
    }
    return self::doCount($criteria, $con);
  }

}
