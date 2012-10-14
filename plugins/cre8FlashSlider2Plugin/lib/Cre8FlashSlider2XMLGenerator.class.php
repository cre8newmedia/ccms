<?php

class Cre8FlashSlider2XMLGenerator
{
  static public function updateAndSave()
  {
    /*
    echo '<pre>';
    print_r(sfConfig::get('app_cre8_flash_slider2_buttonPos', 'ddddd'));
    die();
    */
    $filePath = sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'cre8_flash_slider2_data.xml';
    
    $dom = new DOMDocument();
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    
    $root = $dom->appendChild(new DOMElement('xml'));
    
    $settings = $root->appendChild(new DOMElement('settings'));
    $settings->appendChild(new DOMAttr('width', sfConfig::get('app_cre8_flash_slider2_width', 468)));
    $settings->appendChild(new DOMAttr('height', sfConfig::get('app_cre8_flash_slider2_height', 200)));
    $settings->appendChild(new DOMAttr('buttonPos', sfConfig::get('app_cre8_flash_slider2_buttonPos', 'bottom-right')));
    $settings->appendChild(new DOMAttr('showNav', sfConfig::get('app_cre8_flash_slider2_showNav', 'true')));
    $settings->appendChild(new DOMAttr('showNumber', sfConfig::get('app_cre8_flash_slider2_showNumber', 'true')));
    $settings->appendChild(new DOMAttr('btnNumberBgColor', sfConfig::get('app_cre8_flash_slider2_btnNumberBgColor', '0xFFFFFF')));
    $settings->appendChild(new DOMAttr('bntNumberForeColor', sfConfig::get('app_cre8_flash_slider2_bntNumberForeColor', '0x000000')));
    $settings->appendChild(new DOMAttr('showArrow', sfConfig::get('app_cre8_flash_slider2_showArrow', 'true')));
    $settings->appendChild(new DOMAttr('btnArrowBgColor', sfConfig::get('app_cre8_flash_slider2_btnArrowBgColor', '0xFFFFFF')));
    $settings->appendChild(new DOMAttr('bntArrowForeColor', sfConfig::get('app_cre8_flash_slider2_bntArrowForeColor', '0x000000')));
    $settings->appendChild(new DOMAttr('showPause', sfConfig::get('app_cre8_flash_slider2_showPause', 'true')));
    $settings->appendChild(new DOMAttr('btnPauseBgColor', sfConfig::get('app_cre8_flash_slider2_btnPauseBgColor', '0x999999')));
    $settings->appendChild(new DOMAttr('bntPauseForeColor', sfConfig::get('app_cre8_flash_slider2_bntPauseForeColor', '0xFFFFFF')));
    $settings->appendChild(new DOMAttr('btnSpace', sfConfig::get('app_cre8_flash_slider2_btnSpace', 2)));
    
    $images = $root->appendChild(new DOMElement('images'));
    
    $c = new Criteria();
    $c->addAscendingOrderByColumn(Cre8FlashSlider2Peer::RANK);
    foreach(Cre8FlashSlider2Peer::doSelect($c) as $homeBanner) {
      $image = $images->appendChild(new DOMElement('image'));
      $image->appendChild(new DOMElement('file', '/uploads/' . $homeBanner->getFileName()));
      $text = $image->appendChild(new DOMElement('text', $homeBanner->getTextContent()));
      $text->appendChild(new DOMAttr('width', $homeBanner->getTextWidth()));
      $text->appendChild(new DOMAttr('xpos', $homeBanner->getTextXPos()));
      $text->appendChild(new DOMAttr('ypos', $homeBanner->getTextYPos()));
      $text->appendChild(new DOMAttr('bgAlpha', $homeBanner->getBgAlpha()));
      $text->appendChild(new DOMAttr('bgColor', $homeBanner->getBgColour()));
      $image->appendChild(new DOMElement('url', $homeBanner->getUrl() ? $homeBanner->getUrl() : '#'));
      $image->appendChild(new DOMElement('window', '_self'));
      $image->appendChild(new DOMElement('timer', $homeBanner->getTimer()));
      
    }
    $dom->save($filePath);
    return $dom;
  }
  
}