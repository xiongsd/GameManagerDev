<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: manager.proto

namespace Manager;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>manager.B2M_ConfirmAgentRegister_Request</code>
 */
class B2M_ConfirmAgentRegister_Request extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>string account = 1;</code>
     */
    private $account = '';
    /**
     * <code>int32 actor_id = 2;</code>
     */
    private $actor_id = 0;

    public function __construct() {
        \GPBMetadata\Manager::initOnce();
        parent::__construct();
    }

    /**
     * <code>string account = 1;</code>
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * <code>string account = 1;</code>
     */
    public function setAccount($var)
    {
        GPBUtil::checkString($var, True);
        $this->account = $var;
    }

    /**
     * <code>int32 actor_id = 2;</code>
     */
    public function getActorId()
    {
        return $this->actor_id;
    }

    /**
     * <code>int32 actor_id = 2;</code>
     */
    public function setActorId($var)
    {
        GPBUtil::checkInt32($var);
        $this->actor_id = $var;
    }

}
