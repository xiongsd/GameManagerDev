<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: head.proto

namespace Head;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>head.Heartbeat_Response</code>
 */
class Heartbeat_Response extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>int64 time = 1;</code>
     */
    private $time = 0;

    public function __construct() {
        \GPBMetadata\Head::initOnce();
        parent::__construct();
    }

    /**
     * <code>int64 time = 1;</code>
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * <code>int64 time = 1;</code>
     */
    public function setTime($var)
    {
        GPBUtil::checkInt64($var);
        $this->time = $var;
    }

}

