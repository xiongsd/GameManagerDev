<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: manager.proto

namespace Manager;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>manager.HistoryRechargeCardCount</code>
 */
class HistoryRechargeCardCount extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>int64 day = 1;</code>
     */
    private $day = 0;
    /**
     * <code>int32 count = 2;</code>
     */
    private $count = 0;

    public function __construct() {
        \GPBMetadata\Manager::initOnce();
        parent::__construct();
    }

    /**
     * <code>int64 day = 1;</code>
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * <code>int64 day = 1;</code>
     */
    public function setDay($var)
    {
        GPBUtil::checkInt64($var);
        $this->day = $var;
    }

    /**
     * <code>int32 count = 2;</code>
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * <code>int32 count = 2;</code>
     */
    public function setCount($var)
    {
        GPBUtil::checkInt32($var);
        $this->count = $var;
    }

}

