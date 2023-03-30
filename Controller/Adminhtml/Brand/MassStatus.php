<?php

/**
 * This source file is subject to the rabari.com license that is
 * available through the world-wide-web at this URL:
 * https://www.rabari.com/license-agreement
 */

namespace Rabari\BrandSlider\Controller\Adminhtml\Brand;

/**
 * MassStatus action
 * @category Rabari
 * @package  Rabari_BrandSlider
 * @module   BrandSlider
 * @author   dev@rabari.com
 */
class MassStatus extends \Rabari\BrandSlider\Controller\Adminhtml\Brand
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
        $brandIds = $this->getRequest()->getParam('brand');
        $status = $this->getRequest()->getParam('status');
        $storeViewId = $this->getRequest()->getParam('store');

        if (!is_array($brandIds) || empty($brandIds)) {
            $this->messageManager->addError(__('Please select brand(s).'));
        } else {
            $brandCollection = $this->_brandCollectionFactory->create()
                ->setStoreViewId($storeViewId)
                ->addFieldToFilter('entity_id', ['in' => $brandIds]);
            try {
                foreach ($brandCollection as $brand) {
                    $brand->setStoreViewId($storeViewId)
                        ->setStatus($status)
                        ->setIsMassupdate(true)
                        ->save();
                }
                $this->messageManager->addSuccess(
                    __('A total of %1 record(s) have been changed status.', count($brandIds))
                );
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }
        $resultRedirect = $this->resultRedirectFactory->create();

        return $resultRedirect->setPath('*/*/', ['store' => $this->getRequest()->getParam('store')]);
    }
}
