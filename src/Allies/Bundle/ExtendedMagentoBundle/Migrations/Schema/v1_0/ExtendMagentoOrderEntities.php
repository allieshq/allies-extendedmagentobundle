<?php

namespace Allies\Bundle\ExtendedMagentoBundle\Migrations\Schema\v1_0;

use Doctrine\DBAL\Schema\Schema;

use Oro\Bundle\EntityExtendBundle\EntityConfig\ExtendScope;
use Oro\Bundle\MigrationBundle\Migration\Migration;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

class ExtendMagentoOrderEntities implements Migration
{
    /**
     * {@inheritdoc}
     */
    public function up(Schema $schema, QueryBag $queries)
    {
        self::addOrderEntityExtendFields($schema);
    }
    
    /**
     * @param Schema $schema
     */
    public static function addOrderEntityExtendFields(Schema $schema)
    {
        $table = $schema->getTable('orocrm_magento_order');
        
        $table->addColumn('state', 'string', [
            'length' => 32,
            'oro_options' => [
                'extend' => ['owner' => ExtendScope::OWNER_SYSTEM, 'is_extend' => true],
                'datagrid' => ['is_visible' => false, 'show_filter' => false],
                'merge' => ['display' => true],
                'dataaudit' => ['auditable' => true],
                'importexport' => ['excluded' => false, 'identity' => false],
            ],
        ]);
        $table->addColumn('couponRuleName', 'string', [
            'length' => 255,
            'oro_options' => [
                'extend' => ['owner' => ExtendScope::OWNER_SYSTEM, 'is_extend' => true],
                'datagrid' => ['is_visible' => false, 'show_filter' => false],
                'merge' => ['display' => true],
                'dataaudit' => ['auditable' => true],
                'importexport' => ['excluded' => false, 'identity' => false],
            ],
        ]);
        $table->addColumn('shippingDescription', 'string', [
            'length' => 255,
            'oro_options' => [
                'extend' => ['owner' => ExtendScope::OWNER_SYSTEM, 'is_extend' => true],
                'datagrid' => ['is_visible' => false, 'show_filter' => false],
                'merge' => ['display' => true],
                'dataaudit' => ['auditable' => true],
                'importexport' => ['excluded' => false, 'identity' => false],
            ],
        ]);
        $table->addColumn('discountDescription', 'string', [
            'length' => 255,
            'oro_options' => [
                'extend' => ['owner' => ExtendScope::OWNER_SYSTEM, 'is_extend' => true],
                'datagrid' => ['is_visible' => false, 'show_filter' => false],
                'merge' => ['display' => true],
                'dataaudit' => ['auditable' => true],
                'importexport' => ['excluded' => false, 'identity' => false],
            ],
        ]);
        
        $table->addColumn('hiddenTaxAmount', 'money', [
            'oro_options' => [
                'extend' => ['owner' => ExtendScope::OWNER_SYSTEM, 'is_extend' => true],
                'datagrid' => ['is_visible' => false, 'show_filter' => false],
                'merge' => ['display' => true],
                'dataaudit' => ['auditable' => true],
                'importexport' => ['excluded' => false, 'identity' => false],
            ],
        ]);
        $table->addColumn('shippingTaxAmount', 'money', [
            'oro_options' => [
                'extend' => ['owner' => ExtendScope::OWNER_SYSTEM, 'is_extend' => true],
                'datagrid' => ['is_visible' => false, 'show_filter' => false],
                'merge' => ['display' => true],
                'dataaudit' => ['auditable' => true],
                'importexport' => ['excluded' => false, 'identity' => false],
            ],
        ]);
        $table->addColumn('shippingHiddenTaxAmount', 'money', [
            'oro_options' => [
                'extend' => ['owner' => ExtendScope::OWNER_SYSTEM, 'is_extend' => true],
                'datagrid' => ['is_visible' => false, 'show_filter' => false],
                'merge' => ['display' => true],
                'dataaudit' => ['auditable' => true],
                'importexport' => ['excluded' => false, 'identity' => false],
            ],
        ]);
        $table->addColumn('shippingInclTax', 'money', [
            'oro_options' => [
                'extend' => ['owner' => ExtendScope::OWNER_SYSTEM, 'is_extend' => true],
                'datagrid' => ['is_visible' => false, 'show_filter' => false],
                'merge' => ['display' => true],
                'dataaudit' => ['auditable' => true],
                'importexport' => ['excluded' => false, 'identity' => false],
            ],
        ]);
        $table->addColumn('surchargeAmount', 'money', [
            'oro_options' => [
                'extend' => ['owner' => ExtendScope::OWNER_SYSTEM, 'is_extend' => true],
                'datagrid' => ['is_visible' => false, 'show_filter' => false],
                'merge' => ['display' => true],
                'dataaudit' => ['auditable' => true],
                'importexport' => ['excluded' => false, 'identity' => false],
            ],
        ]);
        $table->addColumn('subtotalInclTax', 'money', [
            'oro_options' => [
                'extend' => ['owner' => ExtendScope::OWNER_SYSTEM, 'is_extend' => true],
                'datagrid' => ['is_visible' => false, 'show_filter' => false],
                'merge' => ['display' => true],
                'dataaudit' => ['auditable' => true],
                'importexport' => ['excluded' => false, 'identity' => false],
            ],
        ]);
        $table->addColumn('rewardsDiscountAmount', 'money', [
            'oro_options' => [
                'extend' => ['owner' => ExtendScope::OWNER_SYSTEM, 'is_extend' => true],
                'datagrid' => ['is_visible' => false, 'show_filter' => false],
                'merge' => ['display' => true],
                'dataaudit' => ['auditable' => true],
                'importexport' => ['excluded' => false, 'identity' => false],
            ],
        ]);
        $table->addColumn('rewardsDiscountTaxAmount', 'money', [
            'oro_options' => [
                'extend' => ['owner' => ExtendScope::OWNER_SYSTEM, 'is_extend' => true],
                'datagrid' => ['is_visible' => false, 'show_filter' => false],
                'merge' => ['display' => true],
                'dataaudit' => ['auditable' => true],
                'importexport' => ['excluded' => false, 'identity' => false],
            ],
        ]);
        
        $table->addColumn('mailchimpCampaignId', 'string', [
            'length' => 10,
            'oro_options' => [
                'extend' => ['owner' => ExtendScope::OWNER_SYSTEM, 'is_extend' => true],
                'datagrid' => ['is_visible' => false, 'show_filter' => false],
                'merge' => ['display' => true],
                'dataaudit' => ['auditable' => true],
                'importexport' => ['excluded' => false, 'identity' => false],
            ],
        ]);
        $table->addColumn('oscCustomercomment', 'text', [
            'oro_options' => [
                'extend' => ['owner' => ExtendScope::OWNER_SYSTEM, 'is_extend' => true],
                'datagrid' => ['is_visible' => false, 'show_filter' => false],
                'merge' => ['display' => true],
                'dataaudit' => ['auditable' => true],
                'importexport' => ['excluded' => false, 'identity' => false],
            ],
        ]);
        $table->addColumn('oscCustomerfeedback', 'text', [
            'oro_options' => [
                'extend' => ['owner' => ExtendScope::OWNER_SYSTEM, 'is_extend' => true],
                'datagrid' => ['is_visible' => false, 'show_filter' => false],
                'merge' => ['display' => true],
                'dataaudit' => ['auditable' => true],
                'importexport' => ['excluded' => false, 'identity' => false],
            ],
        ]);
    }
}