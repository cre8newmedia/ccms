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
 * @version    SVN: $Id: sfGuardUser.php 7634 2008-02-27 18:01:40Z fabien $
 */
class sfGuardUser extends PluginsfGuardUser
{
  /**
   * Override save method in order to update the forum's user
   *
   * @see     sfGuardPlugin/lib/model/om/BasesfGuardUser#save($con)
   * @param   PropelPDO $con  optional connection parameter
   * @return  void
   */
  public function save(PropelPDO $con = null)
  {
    sfContext::getInstance()->getEventDispatcher()->notify(new sfEvent($this, 'sf_guard.user.save', array()));
    return parent::save($con);
  }

  /**
   * Override delete method in order to update the forum's user
   *
   * @see     sfGuardPlugin/lib/model/plugin/PluginsfGuardUser#delete($con)
   * @param   PropelPDO $con  optional connection parameter
   * @return  void
   */
  public function delete(PropelPDO $con = null)
  {
      $userId = $this->getId();
      $retVal = parent::delete($con);
      prestaForumFactory::getForumConnectorInstance()->deleteForumUser( $userId );
      return $retVal;
  }

  public function getCulture()
  {
    return 'en_GB';
  }

}
