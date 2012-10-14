<?php

require_once dirname(__FILE__).'/../lib/userGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/userGeneratorHelper.class.php';

/**
 * user actions.
 *
 * @package    ccms
 * @subpackage user
 * @author     Bogumil Wrona <b.wrona@cre8newmedia.com>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class userActions extends autoUserActions
{
  public function executeBatchExportToMailingList(sfWebRequest $request) {
    $csvWriter = new sfCsvWriter();
    $csv = "";
    foreach(sfGuardUserQuery::create()->filterByPrimaryKeys($request->getParameter('ids'))->find() as $sfGuardUser)
    {
      $dataArray = array();
      $dataArray[] =  $sfGuardUser->getUsername();
      if($sfGuardUser->getProfile()->getFirstName()) {
        $dataArray[] = $sfGuardUser->getProfile()->getFirstName();
      }
      if($sfGuardUser->getProfile()->getLastName()) {
        $dataArray[] = $sfGuardUser->getProfile()->getLastName();
      }
        
      $csv .= $csvWriter->write($dataArray) . "\n";
    }
    header('Content-Type: application/msexcel;charset=UTF-8');
    header('Content-Disposition: attachment;filename=contacts.csv');
    echo $csv;
  }
}
