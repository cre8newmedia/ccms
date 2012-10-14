<?php


/**
 * Skeleton subclass for performing query and update operations on the 'cre8_flash_slider2' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.0-dev on:
 *
 * czw, 18 lut 2010, 17:03:13
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.plugins.cre8FlashSlider2Plugin.lib.model
 */
class Cre8FlashSlider2Query extends BaseCre8FlashSlider2Query {

	/**
	 * Returns a new Cre8FlashSlider2Query object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    Cre8FlashSlider2Query
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof Cre8FlashSlider2Query) {
			return $criteria;
		}
		$query = new self('propel', 'Cre8FlashSlider2', $modelAlias);
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

} // Cre8FlashSlider2Query
