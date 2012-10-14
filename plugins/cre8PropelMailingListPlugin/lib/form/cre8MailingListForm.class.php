<?php

/**
 * cre8MailingList form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class cre8MailingListForm extends Basecre8MailingListForm
{
  public function configure()
  {
    $this->validatorSchema['email'] = new sfValidatorEmail();
  }
}
