<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: manager.proto

namespace Manager;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>manager.B2M_GetRegisterAgent_Request</code>
 */
class B2M_GetRegisterAgent_Request extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>int32 page = 1;</code>
     */
    private $page = 0;

    public function __construct() {
        \GPBMetadata\Manager::initOnce();
        parent::__construct();
    }

    /**
     * <code>int32 page = 1;</code>
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * <code>int32 page = 1;</code>
     */
    public function setPage($var)
    {
        GPBUtil::checkInt32($var);
        $this->page = $var;
    }

}

