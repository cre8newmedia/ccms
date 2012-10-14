<?php

/**
 * Cre8MenuContent form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class Plugincre8MenuContentForm extends Basecre8MenuContentForm
{
  
  /**
   * @var cre8ContentType
   */
  public $contentType = null;
  
  public function configure()
  {
    parent::configure();

    $this->widgetSchema['cre8_menu_content_view_permission_list']->setLabel('View permission');

    unset(
      $this['slug'],
      $this['deleted_at']
    );

    if(!sfContext::getInstance()->getUser()->hasCredential('admin')) {
      unset($this['cre8_menu_content_view_permission_list']);
    }

    if(!sfContext::getInstance()->getUser()->hasCredential('moderator')) {
      unset(
        $this['cre8_menu_type_id'],
        $this['cre8_content_type_id'],
        $this['template'],
        $this['module'],
        $this['sortable_rank']
      );
    }
    
    if(! $this->getObject()->isNew())
    {
      
      /**
       * CONTENT TYPE:
       */
      $contentType = $this->getObject()->getcre8ContentType();
      $this->contentType = $contentType;
      
      switch($contentType->getName())
      {
        case 'cms':
          $menuContentTypeCmss = $this->getObject()->getcre8MenuContentTypeCmss();
          $menuContentTypeCms = count($menuContentTypeCmss) ? $menuContentTypeCmss[0] : null;
          if(is_null($menuContentTypeCms)) {
            $menuContentTypeCms = new cre8MenuContentTypeCms();
            $menuContentTypeCms->setcre8MenuContent($this->getObject());
          }
          
          $cmsForm = new cre8MenuContentTypeCmsForm($menuContentTypeCms);
          unset($cmsForm['cre8_menu_content_id']);
          $this->embedForm('cms', $cmsForm);
          break;
          
        case 'internal_link':
        	
          $menuContentTypeCmss = $this->getObject()->getcre8MenuContentTypeInternalLinks();
          $menuContentTypeCms = count($menuContentTypeCmss) ? $menuContentTypeCmss[0] : null;
          if(is_null($menuContentTypeCms)) {
            $menuContentTypeCms = new cre8MenuContentTypeInternalLink();
            $menuContentTypeCms->setcre8MenuContent($this->getObject());
          }
          
          $cmsForm = new cre8MenuContentTypeInternalLinkForm($menuContentTypeCms);
          unset($cmsForm['cre8_menu_content_id']);
          $this->embedForm('cms', $cmsForm);
          break;
      }
      
      foreach(sfConfig::get('app_cre8_menu_extra_class', array()) as $class)
      {
        
      }
      
      
    }
    
    
  }
  
  
  public function bind(array $taintedValues = null, array $taintedFiles = null) 
  {
    /*
    if(!$this->isNew())
    {
            
    }
    */
  	// call parent bind method
  	parent::bind($taintedValues, $taintedFiles);
  }
}
