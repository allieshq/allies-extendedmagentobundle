<?php

namespace Allies\Bundle\ExtendedMagentoBundle\Migrations\Schema\v1_0;

use Doctrine\DBAL\Schema\Schema;

use Oro\Bundle\EntityExtendBundle\EntityConfig\ExtendScope;
use Oro\Bundle\MigrationBundle\Migration\Migration;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

class ExtendMagentoOrderItemEntities implements Migration
{
    public function up(Schema $schema, QueryBag $queries)
    {
        self::addOrderItemEntityExtendFields($schema);
    }
    
    public static function addOrderItemEntityExtendFields(Schema $schema)
    {
        $table = $schema->getTable('orocrm_magento_order_items');
        
        $table->addColumn('giftMessage', 'text', [
            'oro_options' => [
                'extend' => ['owner' => ExtendScope::OWNER_SYSTEM, 'is_extend' => true],
                'datagrid' => ['is_visible' => false, 'show_filter' => false],
                'merge' => ['display' => true],
                'dataaudit' => ['auditable' => true],
                'importexport' => ['excluded' => false, 'identity' => false],
            ],
        ]);
        $table->addColumn('priceInclTax', 'money', [
            'oro_options' => [
                'extend' => ['owner' => ExtendScope::OWNER_SYSTEM, 'is_extend' => true],
                'datagrid' => ['is_visible' => false, 'show_filter' => false],
                'merge' => ['display' => true],
                'dataaudit' => ['auditable' => true],
                'importexport' => ['excluded' => false, 'identity' => false],
            ],
        ]);
        $table->addColumn('baseCost', 'money', [
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
        $table->addColumn('rowTotalInclTax', 'money', [
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
    }
}