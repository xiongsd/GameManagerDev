<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: manager.proto

namespace Manager;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>manager.M2B_RetriveSendCardRecord_Response</code>
 */
class M2B_RetriveSendCardRecord_Response extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>repeated .manager.SendCardRecord send_card_records = 1;</code>
     */
    private $send_card_records;
    /**
     * <code>int32 page = 2;</code>
     */
    private $page = 0;

    public function __construct() {
        \GPBMetadata\Manager::initOnce();
        parent::__construct();
    }

    /**
     * <code>repeated .manager.SendCardRecord send_card_records = 1;</code>
     */
    public function getSendCardRecords()
    {
        return $this->send_card_records;
    }

    /**
     * <code>repeated .manager.SendCardRecord send_card_records = 1;</code>
     */
    public function setSendCardRecords(&$var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Manager\SendCardRecord::class);
        $this->send_card_records = $arr;
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

