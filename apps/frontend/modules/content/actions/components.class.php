<?php

class contentComponents extends sfComponents {
  public function executeMenu(sfWebRequest $request) {
    $this->cre8MenuContents = cre8MenuContentQuery::create()
            ->where('cre8MenuContent.Cre8MenuTypeId = ?', 1)
            ->where('cre8MenuContent.IsActive = ?', 1)
            ->where('cre8MenuContent.IsHidden = ?', 0)
            ->orderByRank()
            ->find();
  }

  public function executeSearch(sfWebRequest $request) {
    $this->form = new SearchFormFilter($this->getUser()->getAttribute('product_item_filters', array()));
    if($request->isMethod('post')) {
      $this->form->bind($request->getParameter('product_item_filters'));
      if($this->form->isBound() && $this->form->isValid()) {
        $values = $this->form->getValues();
        $this->getUser()->setAttribute('product_item_filters', $values);
        $this->getUser()->setAttribute('product_item_filters_criteria', $this->form->getCriteria());
        return $this->getController()->redirect($this->generateUrl('productList'));
      }
    }
  }

}


