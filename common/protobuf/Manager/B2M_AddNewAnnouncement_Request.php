<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: manager.proto

namespace Manager;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>manager.B2M_AddNewAnnouncement_Request</code>
 */
class B2M_AddNewAnnouncement_Request extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>.manager.Announcement announcements = 1;</code>
     */
    private $announcements = null;

    public function __construct() {
        \GPBMetadata\Manager::initOnce();
        parent::__construct();
    }

    /**
     * <code>.manager.Announcement announcements = 1;</code>
     */
    public function getAnnouncements()
    {
        return $this->announcements;
    }

    /**
     * <code>.manager.Announcement announcements = 1;</code>
     */
    public function setAnnouncements(&$var)
    {
        GPBUtil::checkMessage($var, \Manager\Announcement::class);
        $this->announcements = $var;
    }

}
