<?php

require_once(sfConfig::get('sf_plugins_dir').'/sfGuardPlugin/modules/sfGuardAuth/lib/BasesfGuardAuthActions.class.php');

class sfGuardAuthActions extends BasesfGuardAuthActions {

  public function executeSignin($request) {
    $user = $this->getUser();
    if ($user->isAuthenticated()) {
      return $this->redirect('@homepage');
    }

    $class = sfConfig::get('app_sf_guard_plugin_signin_form', 'sfGuardFormSignin');
    $this->form = new $class();

    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter('signin'));
      if ($this->form->isValid()) {
        $values = $this->form->getValues();
        $this->getUser()->signin($values['user'], array_key_exists('remember', $values) ? $values['remember'] : false);

        // always redirect to a URL set in app.yml
        // or to the referer
        // or to the homepage
        $signinUrl = sfConfig::get('app_sf_guard_plugin_success_signin_url', $user->getAttribute('referer', '@homepage'));

        return $this->redirect($signinUrl);
      }
    }
    else {
      if ($request->isXmlHttpRequest()) {
        $this->getResponse()->setHeaderOnly(true);
        $this->getResponse()->setStatusCode(401);

        return sfView::NONE;
      }

      // set referer
      $this->setSigninReferer();


      $module = sfConfig::get('sf_login_module');
      if ($this->getModuleName() != $module) {
        return $this->redirect($module.'/'.sfConfig::get('sf_login_action'));
      }

      $this->getResponse()->setStatusCode(401);
    }
  }

  protected function setSigninReferer() {
    $default_referer = '@homepage';

    if ($this->getContext()->getActionStack()->getSize() > 0) {
      $action = $this->getContext()->getActionStack()->getFirstEntry()->getActionInstance();
      $security = $action->getSecurityConfiguration();
      $action_name = $this->getContext()->getActionStack()->getFirstEntry()->getActionName();
      $routeName = $action->getContext()->getRouting()->getCurrentInternalUri(true);
      $referer = $routeName ? $routeName : $default_referer;

    } else {
      $referer = $default_referer;
    }

    $this->getUser()->setAttribute('referer', $referer);

  }



}