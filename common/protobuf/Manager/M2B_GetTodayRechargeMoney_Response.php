<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: manager.proto

namespace Manager;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>manager.M2B_GetTodayRechargeMoney_Response</code>
 */
class M2B_GetTodayRechargeMoney_Response extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>repeated .manager.TodayRechargeMoney todayRechargeMoney = 1;</code>
     */
    private $todayRechargeMoney;

    public function __construct() {
        \GPBMetadata\Manager::initOnce();
        parent::__construct();
    }

    /**
     * <code>repeated .manager.TodayRechargeMoney todayRechargeMoney = 1;</code>
     */
    public function getTodayRechargeMoney()
    {
        return $this->todayRechargeMoney;
    }

    /**
     * <code>repeated .manager.TodayRechargeMoney todayRechargeMoney = 1;</code>
     */
    public function setTodayRechargeMoney(&$var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Manager\TodayRechargeMoney::class);
        $this->todayRechargeMoney = $arr;
    }

}

