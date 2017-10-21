<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: manager.proto

namespace Manager;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>manager.LiuCun</code>
 */
class LiuCun extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>int64 day = 1;</code>
     */
    private $day = 0;
    /**
     * <code>float d2 = 2;</code>
     */
    private $d2 = 0.0;
    /**
     * <code>float d3 = 3;</code>
     */
    private $d3 = 0.0;
    /**
     * <code>float d7 = 4;</code>
     */
    private $d7 = 0.0;
    /**
     * <code>float d30 = 5;</code>
     */
    private $d30 = 0.0;

    public function __construct() {
        \GPBMetadata\Manager::initOnce();
        parent::__construct();
    }

    /**
     * <code>int64 day = 1;</code>
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * <code>int64 day = 1;</code>
     */
    public function setDay($var)
    {
        GPBUtil::checkInt64($var);
        $this->day = $var;
    }

    /**
     * <code>float d2 = 2;</code>
     */
    public function getD2()
    {
        return $this->d2;
    }

    /**
     * <code>float d2 = 2;</code>
     */
    public function setD2($var)
    {
        GPBUtil::checkFloat($var);
        $this->d2 = $var;
    }

    /**
     * <code>float d3 = 3;</code>
     */
    public function getD3()
    {
        return $this->d3;
    }

    /**
     * <code>float d3 = 3;</code>
     */
    public function setD3($var)
    {
        GPBUtil::checkFloat($var);
        $this->d3 = $var;
    }

    /**
     * <code>float d7 = 4;</code>
     */
    public function getD7()
    {
        return $this->d7;
    }

    /**
     * <code>float d7 = 4;</code>
     */
    public function setD7($var)
    {
        GPBUtil::checkFloat($var);
        $this->d7 = $var;
    }

    /**
     * <code>float d30 = 5;</code>
     */
    public function getD30()
    {
        return $this->d30;
    }

    /**
     * <code>float d30 = 5;</code>
     */
    public function setD30($var)
    {
        GPBUtil::checkFloat($var);
        $this->d30 = $var;
    }

}
