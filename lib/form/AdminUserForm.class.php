<?php

class AdminUserForm extends UniversalUserForm
{

  /**
   *
   * @var sfGuardUser
   */
  protected $sfGuardUser = null;

  public function __construct($object = null, $options = array(), $CSRFSecret = null)
  {
    $this->sfGuardUser = sfContext::getInstance()->getUser()->getGuardUser();
    parent::__construct($object, $options, $CSRFSecret);
  }

  public function configure()
  {
    parent::configure();

    $this->useFields(array(
      'username',
      'password',
      'password_again',
      'first_name',
      'last_name'
    ), true);

    $this->widgetSchema['sf_guard_user_group_list'] = new sfWidgetFormPropelChoice(array('model' => 'sfGuardGroup', 'label' => 'Permission group', 'expanded' => true, 'multiple' => true));
    $this->validatorSchema['sf_guard_user_group_list'] = new sfValidatorPropelChoice(array('model' => 'sfGuardGroup', 'required' => false, 'multiple' => true));

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


  }
}