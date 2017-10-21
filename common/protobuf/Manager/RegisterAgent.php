<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: manager.proto

namespace Manager;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>manager.RegisterAgent</code>
 */
class RegisterAgent extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>int32 actor_id = 1;</code>
     */
    private $actor_id = 0;
    /**
     * <code>string phone = 2;</code>
     */
    private $phone = '';
    /**
     * <code>string real_name = 3;</code>
     */
    private $real_name = '';
    /**
     * <code>int32 promotion_code = 4;</code>
     */
    private $promotion_code = 0;
    /**
     * <code>int32 introducer = 5;</code>
     */
    private $introducer = 0;
    /**
     * <code>int64 register_agent_time = 6;</code>
     */
    private $register_agent_time = 0;
    /**
     * <code>string account = 7;</code>
     */
    private $account = '';

    public function __construct() {
        \GPBMetadata\Manager::initOnce();
        parent::__construct();
    }

    /**
     * <code>int32 actor_id = 1;</code>
     */
    public function getActorId()
    {
        return $this->actor_id;
    }

    /**
     * <code>int32 actor_id = 1;</code>
     */
    public function setActorId($var)
    {
        GPBUtil::checkInt32($var);
        $this->actor_id = $var;
    }

    /**
     * <code>string phone = 2;</code>
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * <code>string phone = 2;</code>
     */
    public function setPhone($var)
    {
        GPBUtil::checkString($var, True);
        $this->phone = $var;
    }

    /**
     * <code>string real_name = 3;</code>
     */
    public function getRealName()
    {
        return $this->real_name;
    }

    /**
     * <code>string real_name = 3;</code>
     */
    public function setRealName($var)
    {
        GPBUtil::checkString($var, True);
        $this->real_name = $var;
    }

    /**
     * <code>int32 promotion_code = 4;</code>
     */
    public function getPromotionCode()
    {
        return $this->promotion_code;
    }

    /**
     * <code>int32 promotion_code = 4;</code>
     */
    public function setPromotionCode($var)
    {
        GPBUtil::checkInt32($var);
        $this->promotion_code = $var;
    }

    /**
     * <code>int32 introducer = 5;</code>
     */
    public function getIntroducer()
    {
        return $this->introducer;
    }

    /**
     * <code>int32 introducer = 5;</code>
     */
    public function setIntroducer($var)
    {
        GPBUtil::checkInt32($var);
        $this->introducer = $var;
    }

    /**
     * <code>int64 register_agent_time = 6;</code>
     */
    public function getRegisterAgentTime()
    {
        return $this->register_agent_time;
    }

    /**
     * <code>int64 register_agent_time = 6;</code>
     */
    public function setRegisterAgentTime($var)
    {
        GPBUtil::checkInt64($var);
        $this->register_agent_time = $var;
    }

    /**
     * <code>string account = 7;</code>
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * <code>string account = 7;</code>
     */
    public function setAccount($var)
    {
        GPBUtil::checkString($var, True);
        $this->account = $var;
    }

}
