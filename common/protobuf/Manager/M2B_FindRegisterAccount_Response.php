<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: manager.proto

namespace Manager;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>manager.M2B_FindRegisterAccount_Response</code>
 */
class M2B_FindRegisterAccount_Response extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>bool find = 1;</code>
     */
    private $find = false;

    public function __construct() {
        \GPBMetadata\Manager::initOnce();
        parent::__construct();
    }

    /**
     * <code>bool find = 1;</code>
     */
    public function getFind()
    {
        return $this->find;
    }

    /**
     * <code>bool find = 1;</code>
     */
    public function setFind($var)
    {
        GPBUtil::checkBool($var);
        $this->find = $var;
    }

}

