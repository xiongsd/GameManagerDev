<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: manager.proto

namespace Manager;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>manager.M2B_GetAnnouncement_Response</code>
 */
class M2B_GetAnnouncement_Response extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>repeated .manager.Announcement announcements = 1;</code>
     */
    private $announcements;

    public function __construct() {
        \GPBMetadata\Manager::initOnce();
        parent::__construct();
    }

    /**
     * <code>repeated .manager.Announcement announcements = 1;</code>
     */
    public function getAnnouncements()
    {
        return $this->announcements;
    }

    /**
     * <code>repeated .manager.Announcement announcements = 1;</code>
     */
    public function setAnnouncements(&$var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Manager\Announcement::class);
        $this->announcements = $arr;
    }

}
