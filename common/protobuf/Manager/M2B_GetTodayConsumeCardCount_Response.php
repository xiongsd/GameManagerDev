<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: manager.proto

namespace Manager;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>manager.M2B_GetTodayConsumeCardCount_Response</code>
 */
class M2B_GetTodayConsumeCardCount_Response extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>repeated .manager.TodayConsumeCardCount todayConsumeCardCount = 1;</code>
     */
    private $todayConsumeCardCount;

    public function __construct() {
        \GPBMetadata\Manager::initOnce();
        parent::__construct();
    }

    /**
     * <code>repeated .manager.TodayConsumeCardCount todayConsumeCardCount = 1;</code>
     */
    public function getTodayConsumeCardCount()
    {
        return $this->todayConsumeCardCount;
    }

    /**
     * <code>repeated .manager.TodayConsumeCardCount todayConsumeCardCount = 1;</code>
     */
    public function setTodayConsumeCardCount(&$var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Manager\TodayConsumeCardCount::class);
        $this->todayConsumeCardCount = $arr;
    }

}

