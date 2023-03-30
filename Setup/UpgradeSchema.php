<?php
/**
 *  Copyright © Rabari Ltd. All rights reserved.
 *  License:    https://www.rabari.com/license-agreement
 *
 */

namespace Rabari\BrandSlider\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Upgrade the Catalog module DB scheme
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    protected $moduleDataSetup;
    
    /**
     * 
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup
    )
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }
    
    /**
     * {@inheritdoc}
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '2.3.5') < 0) {
            //add store_id for Rabari_BrandSlider_brand table
            $setup->getConnection()->addColumn(
                $setup->getTable('Rabari_BrandSlider_brand'),
                'store_id',
                array(
                    'type'      => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    'nullable'  => true,
                    'length'    => '10',
                    'comment'   => 'Store ID',
                    'after'     => 'status'
                )
            );

        }
        $setup->endSetup();
    }
}
