<?php


/**
 * Skeleton subclass for performing query and update operations on the 'phpbb_search_wordmatch' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.0-dev on:
 *
 * czw, 4 mar 2010, 14:58:11
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.plugins.cre8PhpBBPlugin.lib.model
 */
class PhpbbSearchWordmatchQuery extends BasePhpbbSearchWordmatchQuery {

	/**
	 * Returns a new PhpbbSearchWordmatchQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PhpbbSearchWordmatchQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PhpbbSearchWordmatchQuery) {
			return $criteria;
		}
		$query = new self();
		if (null !== $modelAlias) {
			$query->setModelalias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

} // PhpbbSearchWordmatchQuery