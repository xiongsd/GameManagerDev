<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: manager.proto

namespace Manager;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>manager.M2B_GetRegisterAgentSize_Response</code>
 */
class M2B_GetRegisterAgentSize_Response extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>int32 size = 1;</code>
     */
    private $size = 0;

    public function __construct() {
        \GPBMetadata\Manager::initOnce();
        parent::__construct();
    }

    /**
     * <code>int32 size = 1;</code>
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * <code>int32 size = 1;</code>
     */
    public function setSize($var)
    {
        GPBUtil::checkInt32($var);
        $this->size = $var;
    }

}

