<?php

namespace Allies\Bundle\ExtendedMagentoBundle\Migrations\Schema\v1_2;

use Doctrine\DBAL\Schema\Schema;

use Oro\Bundle\EntityExtendBundle\EntityConfig\ExtendScope;
use Oro\Bundle\MigrationBundle\Migration\Migration;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

class ExtendMagentoOrderAddressEntities implements Migration
{
    /**
     * {@inheritdoc}
     */
    public function up(Schema $schema, QueryBag $queries)
    {
        self::addOrderAddressStreetFields($schema);
    }
    
    /**
     * @param Schema $schema
     */
    public static function addOrderAddressStreetFields(Schema $schema)
    {
        $table = $schema->getTable('orocrm_magento_order_address');
        $oro_options = [
            'extend' => ['owner' => ExtendScope::OWNER_CUSTOM, 'is_extend' => true],
            'datagrid' => ['is_visible' => false, 'show_filter' => false],
            'merge' => ['display' => true],
            'importexport' => ['excluded' => false, 'identity' => false],
        ];
        
        $table->addColumn('street2', 'string', ['notnull' => false, 'length' => 500, 'oro_options' => $oro_options]);
        $table->addColumn('street3', 'string', ['notnull' => false, 'length' => 500, 'oro_options' => $oro_options]);
    }
}
