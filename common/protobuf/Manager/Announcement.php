<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: manager.proto

namespace Manager;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>manager.Announcement</code>
 */
class Announcement extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>int32 id = 1;</code>
     */
    private $id = 0;
    /**
     * <code>int64 time = 2;</code>
     */
    private $time = 0;
    /**
     * <code>string title = 3;</code>
     */
    private $title = '';
    /**
     * <code>string content = 4;</code>
     */
    private $content = '';

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
     * <code>int64 time = 2;</code>
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * <code>int64 time = 2;</code>
     */
    public function setTime($var)
    {
        GPBUtil::checkInt64($var);
        $this->time = $var;
    }

    /**
     * <code>string title = 3;</code>
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * <code>string title = 3;</code>
     */
    public function setTitle($var)
    {
        GPBUtil::checkString($var, True);
        $this->title = $var;
    }

    /**
     * <code>string content = 4;</code>
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * <code>string content = 4;</code>
     */
    public function setContent($var)
    {
        GPBUtil::checkString($var, True);
        $this->content = $var;
    }

}

