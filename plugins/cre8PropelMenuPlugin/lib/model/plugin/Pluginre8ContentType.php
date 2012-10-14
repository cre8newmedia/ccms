<?php

class Plugincre8ContentType extends Basecre8ContentType
{
  public function __toString()
  {
    return $this->getName();
  }

  /**
	 * Initializes internal state of PluginCre8ContentType object.
	 * @see        parent::__construct()
	 */
	public function __construct()
	{
		// Make sure that parent constructor is always invoked, since that
		// is where any default values for this object are set.
		parent::__construct();
	}

}
