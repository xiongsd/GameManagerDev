<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: manager.proto

namespace Manager;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>manager.B2M_GetRecentCreateRoom_Request</code>
 */
class B2M_GetRecentCreateRoom_Request extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>int32 actor_id = 1;</code>
     */
    private $actor_id = 0;

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

}

