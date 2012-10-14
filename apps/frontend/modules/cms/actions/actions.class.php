<?php

/**
 * cms actions.
 *
 * @package    ccms
 * @subpackage cms
 * @author     Bogumil Wrona <b.wrona@cre8newmedia.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cmsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->menuContent = cre8MenuContentPeer::getBySlug($request->getParameter('slug', 'home'));
    $cmsContents = $this->menuContent->getcre8MenuContentTypeCmss();
    $cmsContent = count($cmsContents) ? $cmsContents[0] : new cre8MenuContentTypeCms();
    $this->content = $cmsContent->getContent();
    if($this->menuContent->getTemplate()) {
      $module = $this->menuContent->getModule() ? $this->menuContent->getModule() : 'content';
      $this->setTemplate($this->menuContent->getTemplate(), $module);
    }
  }

}
