<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: manager.proto

namespace Manager;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * <pre>
 * 注册后台
 * </pre>
 *
 * Protobuf type <code>manager.B2M_Register_Request</code>
 */
class B2M_Register_Request extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>int32 id = 1;</code>
     */
    private $id = 0;
    /**
     * <code>string name = 2;</code>
     */
    private $name = '';

    public function __construct() {
        \GPBMetadata\Manager::initOnce();
        parent::__construct();
    }

    /**
     * <code>int32 id = 1;</code>
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * <code>int32 id = 1;</code>
     */
    public function setId($var)
    {
        GPBUtil::checkInt32($var);
        $this->id = $var;
    }

    /**
     * <code>string name = 2;</code>
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * <code>string name = 2;</code>
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;
    }

}

