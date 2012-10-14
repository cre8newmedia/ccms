<?php

class AdminsfGuardUserFormFilter extends sfGuardUserFormFilter {

  /**
   *
   * @var sfGuardUser
   */
  protected $sfGuardUser = null;

  public function __construct($defaults = array(), $options = array(), $CSRFSecret = null) {
    $this->sfGuardUser = sfContext::getInstance()->getUser()->getGuardUser();
    parent::__construct($defaults, $options, $CSRFSecret);
  }

  public function configure() {
    parent::configure();

    unset(
            $this['is_super_admin'],
            $this['sf_guard_user_permission_list']
    );

    $this->widgetSchema['sf_guard_user_group_list']->setLabel('Permission group');
    $this->widgetSchema['username']->setLabel('Username/Email');

    if($this->sfGuardUser && $this->sfGuardUser->hasGroup('moderator')) {
      $sfGuardGroupCriteria = new Criteria();
      $sfGuardGroupCriteria->add(sfGuardGroupPeer::ID, 2, Criteria::GREATER_EQUAL);
      $this->widgetSchema['sf_guard_user_group_list']->setOption('criteria', $sfGuardGroupCriteria);

    }

    if($this->sfGuardUser && $this->sfGuardUser->hasGroup('publisher')) {
      $sfGuardGroupCriteria = new Criteria();
      $sfGuardGroupCriteria->add(sfGuardGroupPeer::ID, 3, Criteria::GREATER_EQUAL);
      $this->widgetSchema['sf_guard_user_group_list']->setOption('criteria', $sfGuardGroupCriteria);

    }

    $this->mergeForm(new AdminsfGuardUserProfileFormFilter());

  }

  public function getFields() {
    return array_merge(parent::getFields(), array(
            'first_name' => 'Text',
            'last_name' => 'Text'
    ));
  }

  public function addFirstNameColumnCriteria(Criteria $criteria, $field, $values) {
    if($values == '') {
      return;
    }
    if (!is_array($values)) {
      $values = array($values);
    }

    if (!count($values)) {
      return;
    }

    $criteria->addJoin(sfGuardUserPeer::ID, sfGuardUserProfilePeer::USER_ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(sfGuardUserProfilePeer::FIRST_NAME, '%' . $value . '%', Criteria::LIKE);
    $criteria->add($criterion);

  }

  public function addLastNameColumnCriteria(Criteria $criteria, $field, $values) {
    if($values == '') {
      return;
    }
    if (!is_array($values)) {
      $values = array($values);
    }
    if (!count($values)) {
      return;
    }

    $criteria->addJoin(sfGuardUserPeer::ID, sfGuardUserProfilePeer::USER_ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(sfGuardUserProfilePeer::LAST_NAME, '%' . $value . '%', Criteria::LIKE);
    $criteria->add($criterion);

  }


}