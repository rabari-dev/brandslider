<?php

/**
 * This source file is subject to the rabari.com license that is
 * available through the world-wide-web at this URL:
 * https://www.rabari.com/license-agreement
 */
namespace Rabari\BrandSlider\Controller\Adminhtml\Brand;

/**
 * Delete Brand action
 * @category Rabari
 * @package  Rabari_BrandSlider
 * @module   BrandSlider
 * @author   dev@rabari.com
 */
class Delete extends \Rabari\BrandSlider\Controller\Adminhtml\Brand
{
    public function execute()
    {
        $brandId = $this->getRequest()->getParam(static::PARAM_CRUD_ID);
        try {
            $brand = $this->_brandFactory->create()->setId($brandId);
            $brand->delete();
            $this->messageManager->addSuccess(
                __('Delete successfully !')
            );
        } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
        }

        $resultRedirect = $this->resultRedirectFactory->create();

        return $resultRedirect->setPath('*/*/');
    }
}
