<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: manager.proto

namespace Manager;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>manager.M2B_GetHistoryNewUserCount_Response</code>
 */
class M2B_GetHistoryNewUserCount_Response extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>repeated .manager.HistoryNewUserCount historyNewUserCount = 1;</code>
     */
    private $historyNewUserCount;

    public function __construct() {
        \GPBMetadata\Manager::initOnce();
        parent::__construct();
    }

    /**
     * <code>repeated .manager.HistoryNewUserCount historyNewUserCount = 1;</code>
     */
    public function getHistoryNewUserCount()
    {
        return $this->historyNewUserCount;
    }

    /**
     * <code>repeated .manager.HistoryNewUserCount historyNewUserCount = 1;</code>
     */
    public function setHistoryNewUserCount(&$var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Manager\HistoryNewUserCount::class);
        $this->historyNewUserCount = $arr;
    }

}

