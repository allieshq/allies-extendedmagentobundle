<?php

namespace Allies\Bundle\ExtendedMagentoBundle\Migrations\Schema\v1_0_1;

use Doctrine\DBAL\Schema\Schema;

use Oro\Bundle\EntityExtendBundle\EntityConfig\ExtendScope;
use Oro\Bundle\MigrationBundle\Migration\Migration;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

class AddIndexes implements Migration
{
    /**
     * {@inheritdoc}
     */
    public function up(Schema $schema, QueryBag $queries)
    {
        self::addMagentoOrderIndexes($schema);
    }
    
    public static function addMagentoOrderIndexes(Schema $schema)
    {
        $table = $schema->getTable('orocrm_magento_order');
        $table->addIndex(['status'], 'IDX_ORDERSTATUS', []);
        $table->addIndex(['state'], 'IDX_ORDERSTATE', []);
        $table->addIndex(['payment_method'], 'IDX_PAYMENTMETHOD', []);
        $table->addIndex(['shipping_method'], 'IDX_SHIPPINGMETHOD', []);
        $table->addIndex(['coupon_code'], 'IDX_COUPONCODE', []);
    }
}