<?php

namespace Allies\Bundle\ExtendedMagentoBundle\Migration\Schema\v1_1;

use Doctrine\DBAL\Schema\Schema;

use Oro\Bundle\EntityExtendBundle\EntityConfig\ExtendScope;
use Oro\Bundle\MigrationBundle\Migration\Migration;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

class ExtendMagentoCartItemEntities implements Migration
{
    
    /**
     * @param Schema $schema
     * @param QueryBag $queries
     */
    public function up(Schema $schema, QueryBag $queries)
    {
        self::addCartItemEntityExtendFields($schema);
    }
    
    /**
     * @param Schema $schema
     */
    public static function addCartItemEntityExtendFields(Schema $schema)
    {
        $table = $schema->getTable('orocrm_magento_cart_item');
        $oro_options = [
            'extend' => ['owner' => ExtendScope::OWNER_CUSTOM, 'is_extend' => true],
            'datagrid' => ['is_visible' => false, 'show_filter' => false],
            'merge' => ['display' => true],
            'dataaudit' => ['auditable' => true],
            'importexport' => ['excluded' => false, 'identity' => false],
        ];
        
        $table->addColumn('appliedRuleIds', 'text', ['notnull' => false, 'oro_options' => $oro_options]);
        $table->addColumn('additionalData', 'text', ['notnull' => false, 'oro_options' => $oro_options]);
        $table->addColumn('isQtyDecimal', 'boolean', ['notnull' => false, 'oro_options' => $oro_options]);
        $table->addColumn('noDiscount', 'boolean', ['notnull' => false, 'oro_options' => $oro_options]);
        $table->addColumn('discountPercent', 'percent', ['precision' => 0, 'comment' => '(DC2Type:percent)', 'oro_options' => $oro_options]);
        $table->addColumn('rowTotalWithDiscount', 'money', ['notnull' => false, 'oro_options' => $oro_options]);
        $table->addColumn('rowWeight', 'float', ['notnull' => false, 'precision' => 0, 'oro_options' => $oro_options]);
        $table->addColumn('taxBeforeDiscount', 'money', ['notnull' => false, 'oro_options' => $oro_options]);
        $table->addColumn('originalCustomPrice', 'money', ['notnull' => false, 'oro_options' => $oro_options]);
        $table->addColumn('rowTotalInclTax', 'money', ['notnull' => false, 'oro_options' => $oro_options]);
        $table->addColumn('hiddenTaxAmount', 'money', ['notnull' => false, 'oro_options' => $oro_options]);
        $table->addColumn('surchargeAmount', 'money', ['notnull' => false, 'oro_options' => $oro_options]);
        $table->addColumn('rowTotBeforeRedemptions', 'money', ['notnull' => false, 'oro_options' => $oro_options]);
        $table->addColumn('rowTotBeforeRedemptionsIncTax', 'money', ['notnull' => false, 'oro_options' => $oro_options]);
        $table->addColumn('rowTotAfterRedemptions', 'money', ['notnull' => false, 'oro_options' => $oro_options]);
        $table->addColumn('rowTotAfterRedemptionsIncTax', 'money', ['notnull' => false, 'oro_options' => $oro_options]);
    }
}