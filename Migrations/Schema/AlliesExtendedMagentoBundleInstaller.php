<?php

namespace Allies\Bundle\ExtendedMagentoBundle\Migrations\Schema;

use Doctrine\DBAL\Schema\Schema;

use Oro\Bundle\ActivityBundle\Migration\Extension\ActivityExtension;
use Oro\Bundle\ActivityBundle\Migration\Extension\ActivityExtensionAwareInterface;

use Oro\Bundle\AttachmentBundle\Migration\Extension\AttachmentExtension;
use Oro\Bundle\AttachmentBundle\Migration\Extension\AttachmentExtensionAwareInterface;

use Oro\Bundle\MigrationBundle\Migration\Installation;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtension;
use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtensionAwareInterface;
use Oro\Bundle\EntityExtendBundle\EntityConfig\ExtendScope;

class AlliesExtendedMagentoBundleInstaller implements
        Installation ,
        AttachmentExtensionAwareInterface ,
        ActivityExtensionAwareInterface ,
        ExtendExtensionAwareInterface
    {
    
    /** @var AttachmentExtension */
    protected $attachmentExtension;
    
    /** @var ActivityExtension */
    protected $activityExtension;
    
    /** @var  ExtendExtension */
    protected $extendExtension;
    
    /**
     * {@inheritdoc}
     */
    public function setAttachmentExtension(AttachmentExtension $attachmentExtension)
    {
        $this->attachmentExtension = $attachmentExtension;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setActivityExtension(ActivityExtension $activityExtension)
    {
        $this->activityExtension = $activityExtension;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setExtendExtension(ExtendExtension $extendExtension)
    {
        $this->extendExtension = $extendExtension;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getMigrationVersion()
    {
        return "v1_2";
    }
    
    /**
     * {@inheritdoc}
     */
    public function up(Schema $schema, QueryBag $queries)
    {
        v1_0\ExtendMagentoOrderEntities::addOrderEntityExtendFields($schema);
        v1_1_1\ExtendMagentoOrderEntities::addOrderEntityExtendFields($schema);
        v1_0\ExtendMagentoOrderItemEntities::addOrderItemEntityExtendFields($schema);
        v1_0_1\AddIndexes::addMagentoOrderIndexes($schema);
        v1_1\ExtendMagentoCartEntities::addCartEntityExtendFields($schema);
        v1_1\ExtendMagentoCartItemEntities::addCartItemEntityExtendFields($schema);
        v1_2\ExtendMagentoCustomerAddressEntities::addCustomerAddressStreetFields($schema);
        v1_2\ExtendMagentoCartAddressEntities::addCartAddressStreetFields($schema);
        v1_2\ExtendMagentoOrderAddressEntities::addOrderAddressStreetFields($schema);
    }
}
