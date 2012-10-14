<?php


/**
 * Skeleton subclass for performing query and update operations on the 'cre8_menu_content' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.0-dev on:
 *
 * wto, 23 lut 2010, 13:09:40
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.plugins.cre8PropelMenuPlugin.lib.model
 */
class cre8MenuContentQuery extends Plugincre8MenuContentQuery {

	/**
	 * Returns a new cre8MenuContentQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    cre8MenuContentQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof cre8MenuContentQuery) {
			return $criteria;
		}
		$query = new self('propel', 'cre8MenuContent', $modelAlias);
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

} // cre8MenuContentQuery