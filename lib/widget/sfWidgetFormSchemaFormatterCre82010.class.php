<?php

class sfWidgetFormSchemaFormatterCre82010 extends sfWidgetFormSchemaFormatter
{
 
  protected

    $rowFormat       = "<li class=\"cre8FormRow%row_class%\">\n  %label%\n  %field%%error%%help%\n%hidden_fields%</li>\n",
    $helpFormat      = '<div class="fieldHelp">&uarr; %help%</div>',
    $decoratorFormat = "<ul>\n  %content% \n</ul>",
    $errorRowFormat = "<div>\n%errors%<br /></div>\n",
    $errorListFormatInARow = "<ul class=\"error_list\">%errors%</ul>\n",
    $errorRowFormatInARow =  "<li class=\"error\">&larr; %error%</li>\n",
    $namedErrorRowFormatInARow = "<li class=\"error\">&larr; %error%</li>\n";


  public function formatRow($label, $field, $errors = array(), $help = '', $hiddenFields = null)
  {
    $row = parent::formatRow(
      $label,
      $field,
      $errors,
      $help,
      $hiddenFields
    );
    sfWidgetFormSchemaFormatterList::getTranslationCallable();
    return strtr($row, array(
      '%row_class%' => (count($errors) > 0) ? ' form_row_error' : '',
    ));
  }

  public function  __construct(sfWidgetFormSchema $widgetSchema) {
    parent::__construct($widgetSchema);
  }
  
}