<?php

class PluginCre8NewsPeer extends BaseCre8NewsPeer 
{
  static public function getNewsForTemplate(sfWebRequest $request)
  {
    $c = self::getActiveNewsCriteria();
    if($request->hasParameter('date') && $request->getParameter('date') != 'all') {
    	if($timestamp = sfDateTimeToolkit::getTS($request->getParameter('date') . '-01')) {
    		try {
    			$sfDate = new sfDate($timestamp);
    			$c = self::getBetweenDisplayDatesCriteria($sfDate->format_database(), $sfDate->finalDayOfMonth()->format_database(), $c);
    		} catch (Exception $e) {
    			
    		}
    		
    	}
    }
  	$pager = new sfPropelPager('PluginCre8News', 20);
    $pager->setCriteria($c);
    $pager->setPage($request->getParameter('page', 1));
    $pager->init();
    return $pager;
  }
  
  static public function getActiveNewsCriteria($criteria = null)
  {
    $c = new Criteria();
    if($criteria) {
      $c = clone $criteria;
    }
    
    $c->add(self::IS_ACTIVE, true);
    $c->addDescendingOrderByColumn(self::DISPLAY_DATE);
    
    return $c;
  }
  
  static public function getBetweenDisplayDatesCriteria($startDate, $endDate, $criteria = null)
  {
  	$c = new Criteria();
    if($criteria) {
      $c = clone $criteria;
    }
    $crit0 = $c->getNewCriterion(self::DISPLAY_DATE, $startDate, Criteria::GREATER_EQUAL);
		$crit1 = $c->getNewCriterion(self::DISPLAY_DATE, $endDate, Criteria::LESS_EQUAL);
		// Perform AND at level 0 ($crit0 $crit1 )
		$crit0->addAnd($crit1);
		// Remember to change the peer class here for the correct one in your model
		$c->add($crit0);
		return $c;
  }
  
  static public function getForNewsSection(array $list, $splitAfter = 2)
  {
    $arrayA = array();
    $arrayB = array();
    
    if(count($list) >= $splitAfter) {
      $arrayA = array_slice($list, 0, $splitAfter, false);
      $arrayB = array_slice($list, $splitAfter);
    } else {
      $arrayA = $list;
    }
    
    return array($arrayA, $arrayB);
  }
  
 static public function getBySlug($slug = null)
  {
    if(!$slug || !is_string($slug)) {
      return null;
    }
    $c = new Criteria();
    $c->add(self::SLUG, $slug);
    return self::doSelectOne($c);
  }
  
  static public function doCountBetweenDates($startDate, $endDate, $criteria = null)
  {
  	$c = new Criteria();
    if($criteria) {
      $c = clone $criteria;
    }
		$c = self::getBetweenDisplayDatesCriteria($startDate, $endDate, $c);
		return self::doCount($c);
  }
}