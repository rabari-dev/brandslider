<?php
/**
 * This source file is subject to the rabari.com license that is
 * available through the world-wide-web at this URL:
 * https://www.rabari.com/license-agreement
 */
namespace Rabari\BrandSlider\Controller\Adminhtml\Brand;

/**
 * Edit Brand action.
 * @category Rabari
 * @package  Rabari_BrandSlider
 * @module   BrandSlider
 * @author   dev@rabari.com
 */
class Edit extends \Rabari\BrandSlider\Controller\Adminhtml\Brand
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('entity_id');
        $storeViewId = $this->getRequest()->getParam('store');
        $model = $this->_brandFactory->create();

        if ($id) {
            $model->setStoreViewId($storeViewId)->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This brand no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();

                return $resultRedirect->setPath('*/*/');
            }
        }
        
        $data = $this->_getSession()->getFormData(true);
        
        if (!empty($data)) {
            $model->setData($data);
        } elseif (!$id) {
            $brand_name = $this->_getSession()->getBrandName();
            $image_alt = $this->_getSession()->getImageAlt();
            if (isset($brand_name) && strlen($brand_name)) {
                $data = [ 'name' => $brand_name, 'image_alt' => $image_alt ];
                $model->setData($data);
            }
            
        }

        $this->_coreRegistry->register('brand', $model);

        $resultPage = $this->_resultPageFactory->create();

        return $resultPage;
    }
}
