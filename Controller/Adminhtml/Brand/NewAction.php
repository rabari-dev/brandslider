<?php

/**
 * This source file is subject to the rabari.com license that is
 * available through the world-wide-web at this URL:
 * https://www.rabari.com/license-agreement
 */

namespace Rabari\BrandSlider\Controller\Adminhtml\Brand;

/**
 * NewAction
 * @category Rabari
 * @package  Rabari_BrandSlider
 * @module   BrandSlider
 * @author   dev@rabari.com
 */
class NewAction extends \Rabari\BrandSlider\Controller\Adminhtml\Brand
{
    public function execute()
    {
        $resultForward = $this->_resultForwardFactory->create();
         $this->_getSession()->unsBrandName();
         $this->_getSession()->unsImageAlt();
        return $resultForward->forward('edit');
    }
}
