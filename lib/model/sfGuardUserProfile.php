<?php


/**
 * Skeleton subclass for representing a row from the 'sf_guard_user_profile' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.0-dev on:
 *
 * czw, 18 lut 2010, 17:03:14
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class sfGuardUserProfile extends BasesfGuardUserProfile {
  public function getFullName() {
    return $this->getFirstName() . ' ' . $this->getLastName();
  }
} // sfGuardUserProfile