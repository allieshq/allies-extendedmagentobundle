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

use Allies\Bundle\ExtendedMagentoBundle\Migrations\Schema\v1_0\ExtendMagentoOrderEntities as ExtendMagentoOrderEntities_v1_0;
use Allies\Bundle\ExtendedMagentoBundle\Migrations\Schema\v1_0\ExtendMagentoOrderItemEntities as ExtendMagentoOrderItemEntities_v1_0;
use Allies\Bundle\ExtendedMagentoBundle\Migrations\Schema\v1_0_1\AddIndexes as AddIndexes_v1_0_1;
use Allies\Bundle\ExtendedMagentoBundle\Migrations\Schema\v1_1\ExtendMagentoCartEntities as ExtendMagentoCartEntities_v1_1;
use Allies\Bundle\ExtendedMagentoBundle\Migrations\Schema\v1_1\ExtendMagentoCartItemEntities as ExtendMagentoCartItemEntities_v1_1;

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
        return "v1_1";
    }
    
    /**
     * {@inheritdoc}
     */
    public function up(Schema $schema, QueryBag $queries)
    {
        ExtendMagentoOrderEntities_v1_0::addOrderEntityExtendFields($schema);
        ExtendMagentoOrderItemEntities_v1_0::addOrderItemEntityExtendFields($schema);
        AddIndexes_v1_0_1::addMagentoOrderIndexes($schema);
        ExtendMagentoCartEntities_v1_1::addCartEntityExtendFields($schema);
        ExtendMagentoCartItemEntities_v1_1::addCartItemEntityExtendFields($schema);
    }
}
