<?php

namespace Allies\Bundle\ExtendedMagentoBundle\Migration\Schema\v1_1;

use Doctrine\DBAL\Schema\Schema;

use Oro\Bundle\EntityExtendBundle\EntityConfig\ExtendScope;
use Oro\Bundle\MigrationBundle\Migration\Migration;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

class ExtendMagentoCartEntities implements Migration
{
    
    /**
     * @param Schema $schema
     * @param QueryBag $queries
     */
    public function up(Schema $schema, QueryBag $queries)
    {
        self::addCartEntityExtendFields($schema);
    }
    
    /**
     * @param Schema $schema
     */
    public static function addCartEntityExtendFields(Schema $schema)
    {
        $table = $schema->getTable('orocrm_magento_cart');
        $oro_options = [
            'extend' => ['owner' => ExtendScope::OWNER_CUSTOM, 'is_extend' => true],
            'datagrid' => ['is_visible' => false, 'show_filter' => false],
            'merge' => ['display' => true],
            'dataaudit' => ['auditable' => true],
            'importexport' => ['excluded' => false, 'identity' => false],
        ];
        
        $table->addColumn('isActive', 'boolean', ['notnull' => false, 'oro_options' => $oro_options]);
        $table->addColumn('isVirtual', 'boolean', ['notnull' => false, 'oro_options' => $oro_options]);
        $table->addColumn('isMultiShipping', 'boolean', ['notnull' => false, 'oro_options' => $oro_options]);
        $table->addColumn('isPersistent', 'boolean', ['notnull' => false, 'oro_options' => $oro_options]);
        
        $table->addColumn('checkoutMethod', 'string', ['notnull' => false, 'length' => 255, 'oro_options' => $oro_options]);
        
        $table->addColumn('customerPrefix', 'string', ['notnull' => false, 'length' => 40, 'oro_options' => $oro_options]);
        $table->addColumn('customerMiddlename', 'string', ['notnull' => false, 'length' => 40, 'oro_options' => $oro_options]);
        $table->addColumn('customerSuffix', 'string', ['notnull' => false, 'length' => 40, 'oro_options' => $oro_options]);
        $table->addColumn('customerDob', 'datetime', ['notnull' => false, 'oro_options' => $oro_options]);
        $table->addColumn('customerNote', 'string', ['notnull' => false, 'length' => 255, 'oro_options' => $oro_options]);
        $table->addColumn('customerTaxvat', 'string', ['notnull' => false, 'length' => 255, 'oro_options' => $oro_options]);
        $table->addColumn('customerGender', 'string', ['notnull' => false, 'length' => 255, 'oro_options' => $oro_options]);
        
        $table->addColumn('remoteIp', 'string', ['notnull' => false, 'length' => 32, 'oro_options' => $oro_options]);
        $table->addColumn('appliedRuleIds', 'string', ['notnull' => false, 'length' => 255, 'oro_options' => $oro_options]);
        $table->addColumn('reservedOrderId', 'string', ['notnull' => false, 'length' => 64, 'oro_options' => $oro_options]);
        $table->addColumn('couponCode', 'string', ['notnull' => false, 'length' => 255, 'oro_options' => $oro_options]);
        
        $table->addColumn('subtotalWithDiscount', 'money', ['notnull' => false, 'oro_options' => $oro_options]);
        
        $table->addColumn('oscCustomercomment', 'text', ['notnull' => false, 'oro_options' => $oro_options]);
        $table->addColumn('oscCustomerfeedback', 'text', ['notnull' => false, 'oro_options' => $oro_options]);
        
        $table->addColumn('rewardsPointsSpending', 'integer', ['notnull' => false, 'oro_options' => $oro_options]);
        $table->addColumn('rewardsDiscountAmount', 'money', ['notnull' => false, 'oro_options' => $oro_options]);
        $table->addColumn('rewardsDiscountTaxAmount', 'money', ['notnull' => false, 'oro_options' => $oro_options]);
        $table->addColumn('rewardsValidRedemptions', 'string', ['notnull' => false, 'length' => 255, 'oro_options' => $oro_options]);
        
        $table->addColumn('storeCreditAmountUsed', 'money', ['notnull' => false, 'oro_options' => $oro_options]);
        $table->addColumn('useStoreCredit', 'integer', ['notnull' => false, 'oro_options' => $oro_options]);
    }
    
}