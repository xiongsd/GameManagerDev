<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: manager.proto

namespace Manager;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>manager.M2B_GetTodayRoomCount_Response</code>
 */
class M2B_GetTodayRoomCount_Response extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>repeated .manager.TodayRoomCount todayRoomCount = 1;</code>
     */
    private $todayRoomCount;

    public function __construct() {
        \GPBMetadata\Manager::initOnce();
        parent::__construct();
    }

    /**
     * <code>repeated .manager.TodayRoomCount todayRoomCount = 1;</code>
     */
    public function getTodayRoomCount()
    {
        return $this->todayRoomCount;
    }

    /**
     * <code>repeated .manager.TodayRoomCount todayRoomCount = 1;</code>
     */
    public function setTodayRoomCount(&$var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Manager\TodayRoomCount::class);
        $this->todayRoomCount = $arr;
    }

}

