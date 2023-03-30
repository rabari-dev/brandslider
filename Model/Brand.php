<?php

/**
 * This source file is subject to the rabari.com license that is
 * available through the world-wide-web at this URL:
 * https://www.rabari.com/license-agreement
 */

namespace Rabari\BrandSlider\Model;

use \Rabari\BrandSlider\Api\Data\BrandInterface;
use \Magento\Framework\Model\AbstractModel;

/**
 * Brand Model
 * @author   dev@rabari.com
 */
class Brand extends AbstractModel implements BrandInterface
{
    /**
     * store view id.
     *
     * @var int
     */
    protected $_storeViewId = null;

    /**
     * brand factory.
     *
     * @var \Rabari\BrandSlider\Model\BrandFactory
     */
    protected $_brandFactory;

    /**
     * [$_formFieldHtmlIdPrefix description].
     *
     * @var string
     */
    protected $_formFieldHtmlIdPrefix = 'page_';

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * logger.
     *
     * @var \Magento\Framework\Logger\Monolog
     */
    protected $_monolog;
    
    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Rabari\BrandSlider\Model\ResourceModel\Brand $resource
     * @param \Rabari\BrandSlider\Model\ResourceModel\Brand\Collection $resourceCollection
     * @param \Rabari\BrandSlider\Model\BrandFactory $brandFactory
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Framework\Logger\Monolog $monolog
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Rabari\BrandSlider\Model\ResourceModel\Brand $resource,
        \Rabari\BrandSlider\Model\ResourceModel\Brand\Collection $resourceCollection,
        \Rabari\BrandSlider\Model\BrandFactory $brandFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Logger\Monolog $monolog
    ) {
        parent::__construct(
            $context,
            $registry,
            $resource,
            $resourceCollection
        );
        $this->_brandFactory = $brandFactory;
        $this->_storeManager = $storeManager;

        $this->_monolog = $monolog;

        if ($storeViewId = $this->_storeManager->getStore()->getId()) {
            $this->_storeViewId = $storeViewId;
        }
    }

    /**
     * get form field html id prefix.
     *
     * @return string
     */
    public function getFormFieldHtmlIdPrefix()
    {
        return $this->_formFieldHtmlIdPrefix;
    }

    /**
     * get available slides.
     *
     * @return []
     */
    public function getAvailableSlides()
    {
        $option[] = [
            'value' => '',
            'label' => __('---- Please select a Brand Slider ------'),
        ];

        $brandsliderCollection = $this->_brandsliderCollectionFactory->create();
        foreach ($brandsliderCollection as $brandslider) {
            $option[] = [
                'value' => $brandslider->getId(),
                'label' => $brandslider->getTitle(),
            ];
        }

        return $option;
    }

    /**
     * get store attributes.
     *
     * @return array
     */
    public function getStoreAttributes()
    {
        return [
            'name',
            'status',
            'image_alt',
            'image',
        ];
    }

    /**
     * get store view id.
     *
     * @return int
     */
    public function getStoreViewId()
    {
        return $this->_storeViewId;
    }

    /**
     * set store view id.
     *
     * @param int $storeViewId
     */
    public function setStoreViewId($storeViewId)
    {
        $this->_storeViewId = $storeViewId;

        return $this;
    }

    /**
     * before save.
     */
    public function beforeSave()
    {
        
        return parent::beforeSave();
    }

    /**
     * after save.
     */
    public function afterSave()
    {
        return parent::afterSave();
    }

    /**
     * load info multistore.
     *
     * @param mixed  $id
     * @param string $field
     *
     * @return $this
     */
    public function load($id, $field = null)
    {
        parent::load($id, $field);
        if ($this->getStoreViewId()) {
            $this->getStoreViewValue();
        }

        return $this;
    }

    /**
     * get store view value.
     *
     * @param string|null $storeViewId
     *
     * @return $this
     */
    public function getStoreViewValue($storeViewId = null)
    {
        
        return $this;
    }
}
