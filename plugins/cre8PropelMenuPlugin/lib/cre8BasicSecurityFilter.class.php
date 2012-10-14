<?php

class cre8BasicSecurityFilter extends sfBasicSecurityFilter
{

  /**
   * Executes this filter.
   *
   * @param sfFilterChain $filterChain A sfFilterChain instance
   */
  public function execute($filterChain)
  {
    // disable security on login and secure actions
    if (
      (sfConfig::get('sf_login_module') == $this->context->getModuleName()) && (sfConfig::get('sf_login_action') == $this->context->getActionName())
      ||
      (sfConfig::get('sf_secure_module') == $this->context->getModuleName()) && (sfConfig::get('sf_secure_action') == $this->context->getActionName())
    ) {
      $filterChain->execute();
      return;
    }
    
    if( (!$slug = $this->context->getRequest()->getParameter('slug')) || (!$menuContent = cre8MenuContentPeer::getBySlug($this->context->getRequest()->getParameter('slug', 'home'))) ) {
      $filterChain->execute();
      return;
    }

    $viewPermissions = $menuContent->getcre8MenuContentViewPermissionsJoinsfGuardPermission();

    if(!$viewPermissions->count()) {
      $filterChain->execute();
      return;
    }

    if (!$this->context->getUser()->isAuthenticated())
    {
      if (sfConfig::get('sf_logging_enabled')) {
        $this->context->getEventDispatcher()->notify(new sfEvent($this, 'application.log', array(sprintf('Action "%s/%s" requires authentication, forwarding to "%s/%s"', $this->context->getModuleName(), $this->context->getActionName(), sfConfig::get('sf_login_module'), sfConfig::get('sf_login_action')))));
      }
      // the user is not authenticated
      $this->forwardToLoginAction();
    }

    $userWithoutPermissions = false;
    foreach($viewPermissions as $viewPermission) {
      if(! $this->context->getUser()->hasCredential($viewPermission->getsfGuardPermission())) {
        $userWithoutPermissions = true;
      }
    }

    if($userWithoutPermissions) {
      // the user doesn't have access
      $this->forwardToSecureAction();
    }
    
    // the user has access, continue
    $filterChain->execute();
  }

}
