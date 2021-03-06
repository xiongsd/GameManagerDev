<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: manager.proto

namespace Manager;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>manager.MallItem</code>
 */
class MallItem extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>int32 id = 1;</code>
     */
    private $id = 0;
    /**
     * <code>int32 card_count = 2;</code>
     */
    private $card_count = 0;
    /**
     * <code>int32 money = 3;</code>
     */
    private $money = 0;
    /**
     * <code>string desc = 4;</code>
     */
    private $desc = '';

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
     * <code>int32 card_count = 2;</code>
     */
    public function getCardCount()
    {
        return $this->card_count;
    }

    /**
     * <code>int32 card_count = 2;</code>
     */
    public function setCardCount($var)
    {
        GPBUtil::checkInt32($var);
        $this->card_count = $var;
    }

    /**
     * <code>int32 money = 3;</code>
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * <code>int32 money = 3;</code>
     */
    public function setMoney($var)
    {
        GPBUtil::checkInt32($var);
        $this->money = $var;
    }

    /**
     * <code>string desc = 4;</code>
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * <code>string desc = 4;</code>
     */
    public function setDesc($var)
    {
        GPBUtil::checkString($var, True);
        $this->desc = $var;
    }

}

