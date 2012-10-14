<?php

class phpBBInsertsqlTask extends sfPropelInsertSqlTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
      // add your own options here
    ));

    $this->namespace        = 'phpBB';
    $this->name             = 'insert-sql';
    $this->briefDescription = 'Create tables and populate them with default values for forum';
    $this->detailedDescription = <<<EOF
The [phpBB:insert-sql|INFO] task does things.
Call it with:

  [php symfony phpBB:insert-sql|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    
    $start_time	= microtime( true );
		$this->logSection( 'phpBB', 'Start '.date('Y-m-d H:i:s') );

    $properties = $this->getPhingPropertiesForConnection($databaseManager, $options['connection']);
    $properties['propel.sql.dir'] = sfConfig::get('sf_plugins_dir') . '/cre8PhpBBPlugin/data/sql';

    $ret = $this->callPhing('insert-sql', self::DO_NOT_CHECK_SCHEMA, $properties);

    $this->logSection( 'phpBB', 'End '.date('Y-m-d H:i:s') .' ( Total: '. round( ( microtime(true) - $start_time ), 2) .' s )' );

    return !$ret;
  }
}
