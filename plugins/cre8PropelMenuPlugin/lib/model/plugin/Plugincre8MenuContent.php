<?php

class Plugincre8MenuContent extends Basecre8MenuContent
{
  public function __toString()
  {
  	return $this->getName();
  }

  /**
	 * Initializes internal state of cre8MenuContent object.
	 * @see        parent::__construct()
	 */
	public function __construct()
	{
		// Make sure that parent constructor is always invoked, since that
		// is where any default values for this object are set.
		parent::__construct();
	}

}