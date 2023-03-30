<?php

/**
 * This source file is subject to the rabari.com license that is
 * available through the world-wide-web at this URL:
 * https://www.rabari.com/license-agreement
 */
namespace Rabari\BrandSlider\Controller\Adminhtml\Brand;

use Magento\Framework\App\Filesystem\DirectoryList;

/**
 * ExportCsv action.
 * @category Rabari
 * @package  Rabari_BrandSlider
 * @module   BrandSlider
 * @author   dev@rabari.com
 */
class ExportCsv extends \Rabari\BrandSlider\Controller\Adminhtml\Brand
{
    public function execute()
    {
        $fileName = 'brands.csv';

        /** @var \\Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $content = $resultPage->getLayout()->createBlock('Rabari\BrandSlider\Block\Adminhtml\Brand\Grid')->getCsv();

        return $this->_fileFactory->create($fileName, $content, DirectoryList::VAR_DIR);
    }
}
