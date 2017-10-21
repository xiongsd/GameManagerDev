<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: manager.proto

namespace Manager;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>manager.HistoryRechargeMoney</code>
 */
class HistoryRechargeMoney extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>int64 day = 1;</code>
     */
    private $day = 0;
    /**
     * <pre>
     * 单位分
     * </pre>
     *
     * <code>int64 count = 2;</code>
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
     * <pre>
     * 单位分
     * </pre>
     *
     * <code>int64 count = 2;</code>
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * <pre>
     * 单位分
     * </pre>
     *
     * <code>int64 count = 2;</code>
     */
    public function setCount($var)
    {
        GPBUtil::checkInt64($var);
        $this->count = $var;
    }

}

