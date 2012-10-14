<?php

/**
 * Cre8NewsCategory form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class Cre8NewsCategoryForm extends BaseCre8NewsCategoryForm
{
  public function configure()
  {
    unset(
      $this['slug'],
      $this['cre8_news_cre8_news_category_list'],
      $this['content_news_box_category_list']      
    );
  }
}
