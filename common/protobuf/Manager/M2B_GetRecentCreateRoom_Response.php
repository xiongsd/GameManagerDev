<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: manager.proto

namespace Manager;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>manager.M2B_GetRecentCreateRoom_Response</code>
 */
class M2B_GetRecentCreateRoom_Response extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>repeated .manager.RecentCreateRoom recent_create_room = 1;</code>
     */
    private $recent_create_room;

    public function __construct() {
        \GPBMetadata\Manager::initOnce();
        parent::__construct();
    }

    /**
     * <code>repeated .manager.RecentCreateRoom recent_create_room = 1;</code>
     */
    public function getRecentCreateRoom()
    {
        return $this->recent_create_room;
    }

    /**
     * <code>repeated .manager.RecentCreateRoom recent_create_room = 1;</code>
     */
    public function setRecentCreateRoom(&$var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Manager\RecentCreateRoom::class);
        $this->recent_create_room = $arr;
    }

}

