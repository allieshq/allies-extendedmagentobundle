<?php

namespace Allies\Bundle\ExtendedMagentoBundle\Migrations\Schema\v1_1_1;

use Doctrine\DBAL\Schema\Schema;

use Oro\Bundle\EntityExtendBundle\EntityConfig\ExtendScope;
use Oro\Bundle\MigrationBundle\Migration\Migration;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

class ExtendMagentoOrderEntities implements Migration
{
    
    /**
     * @param Schema $schema
     * @param QueryBag $queries
     */
    public function up(Schema $schema, QueryBag $queries)
    {
        self::addOrderEntityExtendFields($schema);
    }
    
    public static function addOrderEntityExtendFields(Schema $schema)
    {
        $table = $schema->getTable('orocrm_magento_order');
        $oro_options = [
            'extend' => ['owner' => ExtendScope::OWNER_CUSTOM, 'is_extend' => true],
            'datagrid' => ['is_visible' => false, 'show_filter' => false],
            'merge' => ['display' => true],
            'dataaudit' => ['auditable' => true],
            'importexport' => ['excluded' => false, 'identity' => false],
        ];
        
        $table->addColumn('customerPrefix', 'string', ['notnull' => false, 'length' => 40, 'oro_options' => $oro_options]);
        $table->addColumn('customerMiddlename', 'string', ['notnull' => false, 'length' => 40, 'oro_options' => $oro_options]);
        $table->addColumn('customerSuffix', 'string', ['notnull' => false, 'length' => 40, 'oro_options' => $oro_options]);
        $table->addColumn('customerDob', 'datetime', ['notnull' => false, 'oro_options' => $oro_options]);
        $table->addColumn('customerNote', 'string', ['notnull' => false, 'length' => 255, 'oro_options' => $oro_options]);
        $table->addColumn('customerTaxvat', 'string', ['notnull' => false, 'length' => 255, 'oro_options' => $oro_options]);
        $table->addColumn('customerGender', 'string', ['notnull' => false, 'length' => 255, 'oro_options' => $oro_options]);
    }
}