<?php

/**
 * This source file is subject to the rabari.com license that is
 * available through the world-wide-web at this URL:
 * https://www.rabari.com/license-agreement
 */
namespace Rabari\BrandSlider\Block\Adminhtml;

/**
 * Brand grid container.
 * @category Rabari
 * @package  Rabari_BrandSlider
 * @module   BrandSlider
 * @author   dev@rabari.com
 */
class Brand extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor.
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_brand';
        $this->_blockGroup = 'Rabari_BrandSlider';
        $this->_headerText = __('Brands');
        $this->_addButtonLabel = __('Add New Brand');
        parent::_construct();
    }
}
