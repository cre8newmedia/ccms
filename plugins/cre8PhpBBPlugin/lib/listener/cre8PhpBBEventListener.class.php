<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class cre8PhpBBEventListener
{

  public static function listenToInsertSqlEvent( sfEvent $event, $parameters )
	{

    if($event->getSubject() instanceof sfPropelInsertSqlTask) {
      $finder = sfFinder::type('file')->name('plugins.cre8PhpBBPlugin.lib.model.schema.sql');
      if($filesArray = $finder->in($event->getSubject()->tmpDir)) {
        file_put_contents($filesArray[0], "");
      }     
    }

    return $parameters;
	}

}

?>
