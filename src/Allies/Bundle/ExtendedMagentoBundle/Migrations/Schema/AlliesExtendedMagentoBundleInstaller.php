<?php

namespace Allies\Bundle\ExtendedMagentoBundle\Migrations\Schema;

use Doctrine\DBAL\Schema\Schema;

use Oro\Bundle\ActivityBundle\Migration\Extension\ActivityExtension;
use Oro\Bundle\ActivityBundle\Migration\Extension\ActivityExtensionAwareInterface;

use Oro\Bundle\AttachmentBundle\Migration\Extension\AttachmentExtension;
use Oro\Bundle\AttachmentBundle\Migration\Extension\AttachmentExtensionAwareInterface;

use Oro\Bundle\MigrationBundle\Migration\Installation;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

use Oro\Bundle\NoteBundle\Migration\Extension\NoteExtension;
use Oro\Bundle\NoteBundle\Migration\Extension\NoteExtensionAwareInterface;

use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtension;
use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtensionAwareInterface;
use Oro\Bundle\EntityExtendBundle\EntityConfig\ExtendScope;

use Allies\Bundle\ExtendedMagentoBundle\Migrations\Schema\v1_0\ExtendMagentoOrderEntities as ExtendMagentoOrderEntities_v1_0;
use Allies\Bundle\ExtendedMagentoBundle\Migrations\Schema\v1_0\ExtendMagentoOrderItemEntities as ExtendMagentoOrderItemEntities_v1_0;

class AlliesExtendedMagentoBundleInstaller implements
        Installation ,
        AttachmentExtensionAwareInterface ,
        NoteExtensionAwareInterface ,
        ActivityExtensionAwareInterface ,
        ExtendExtensionAwareInterface
    {
    
    /** @var AttachmentExtension */
    protected $attachmentExtension;
    
    /** @var NoteExtension */
    protected $noteExtension;
    
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
    public function setNoteExtension(NoteExtension $noteExtension)
    {
        $this->noteExtension = $noteExtension;
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
        return "v1_0";
    }
    /**
     * {@inheritdoc}
     */
    public function up(Schema $schema, QueryBag $queries)
    {
        ExtendMagentoOrderEntities_v1_0::addOrderEntityExtendFields($schema);
        ExtendMagentoOrderItemEntities_v1_0::addOrderItemEntityExtendFields($schema);
    }
}