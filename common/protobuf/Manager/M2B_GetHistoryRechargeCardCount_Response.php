<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: manager.proto

namespace Manager;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>manager.M2B_GetHistoryRechargeCardCount_Response</code>
 */
class M2B_GetHistoryRechargeCardCount_Response extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>repeated .manager.HistoryRechargeCardCount historyRechargeCardCount = 1;</code>
     */
    private $historyRechargeCardCount;

    public function __construct() {
        \GPBMetadata\Manager::initOnce();
        parent::__construct();
    }

    /**
     * <code>repeated .manager.HistoryRechargeCardCount historyRechargeCardCount = 1;</code>
     */
    public function getHistoryRechargeCardCount()
    {
        return $this->historyRechargeCardCount;
    }

    /**
     * <code>repeated .manager.HistoryRechargeCardCount historyRechargeCardCount = 1;</code>
     */
    public function setHistoryRechargeCardCount(&$var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Manager\HistoryRechargeCardCount::class);
        $this->historyRechargeCardCount = $arr;
    }

}

