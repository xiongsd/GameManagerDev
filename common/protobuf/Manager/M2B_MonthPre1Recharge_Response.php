<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: manager.proto

namespace Manager;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>manager.M2B_MonthPre1Recharge_Response</code>
 */
class M2B_MonthPre1Recharge_Response extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>repeated .manager.Recharge recharges = 1;</code>
     */
    private $recharges;
    /**
     * <code>int32 page = 2;</code>
     */
    private $page = 0;

    public function __construct() {
        \GPBMetadata\Manager::initOnce();
        parent::__construct();
    }

    /**
     * <code>repeated .manager.Recharge recharges = 1;</code>
     */
    public function getRecharges()
    {
        return $this->recharges;
    }

    /**
     * <code>repeated .manager.Recharge recharges = 1;</code>
     */
    public function setRecharges(&$var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Manager\Recharge::class);
        $this->recharges = $arr;
    }

    /**
     * <code>int32 page = 2;</code>
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * <code>int32 page = 2;</code>
     */
    public function setPage($var)
    {
        GPBUtil::checkInt32($var);
        $this->page = $var;
    }

}

