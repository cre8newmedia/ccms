<?php

/**
 * content actions.
 *
 * @package    ccms
 * @subpackage content
 * @author     Bogumil Wrona <b.wrona@cre8newmedia.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contentActions extends sfActions
{
  
  /**
   * @var cre8MenuContent
   */
  public $menuContent = null;

  protected function setMetaTags()
  {
    if($this->menuContent->getMetaTitle()) {
      $this->getResponse()->addMeta('title', $this->menuContent->getMetaTitle());
    }
    if($this->menuContent->getMetaDescription()) {
      $this->getResponse()->addMeta('description', $this->menuContent->getMetaDescription());
    }
    if($this->menuContent->getMetaKeywords()) {
      $this->getResponse()->addMeta('keywords', $this->menuContent->getMetaKeywords());
    }
  }

 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $menuContent = cre8MenuContentPeer::getBySlug($request->getParameter('slug', 'home'));
    $this->forward404If(!$menuContent);
    $this->menuContent = $menuContent;

    $this->setMetaTags();

    if($menuContent->getcre8ContentTypeId() == 1) {
    	$this->forward('cms', 'index');
    }

    if($menuContent->getcre8ContentTypeId() == 2) {
    	$internalLinks = $menuContent->getcre8MenuContentTypeInternalLinks();
    	$internalLink = $internalLinks[0];
    	$this->forward($internalLink->getModule(), $internalLink->getAction());
    }

    $this->forward404();
  }

  public function executeError404(sfWebRequest $request)
  {
    $response = $this->getResponse();

    // HTTP headers
    $response->setStatusCode(404);
    $response->addCacheControlHttpHeader('no-cache');

    $response->addMeta('robots', 'NONE');
    $response->setTitle('Error 404 - Page does not exist');
  }
  
}
