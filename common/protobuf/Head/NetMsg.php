<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: head.proto

namespace Head;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * <pre>
 * 所有网络消息结构体
 * 消息头
 * </pre>
 *
 * Protobuf type <code>head.NetMsg</code>
 */
class NetMsg extends \Google\Protobuf\Internal\Message
{
    /**
     * <pre>
     * 消息号
     * </pre>
     *
     * <code>int32 cmd = 1;</code>
     */
    private $cmd = 0;
    /**
     * <pre>
     * 消息内容，对应结构体
     * </pre>
     *
     * <code>bytes content = 2;</code>
     */
    private $content = '';
    /**
     * <pre>
     * 错误码，0表示无错误
     * </pre>
     *
     * <code>int32 error_code = 3;</code>
     */
    private $error_code = 0;
    /**
     * <pre>
     * 记录消息发送者的账号ID
     * </pre>
     *
     * <code>int32 src_account_id = 4;</code>
     */
    private $src_account_id = 0;
    /**
     * <pre>
     * 记录消息发送者的角色ID
     * </pre>
     *
     * <code>int32 src_actor_id = 5;</code>
     */
    private $src_actor_id = 0;
    /**
     * <pre>
     * 记录消息发送者的LoginServer ID
     * </pre>
     *
     * <code>int32 src_login_server_id = 6;</code>
     */
    private $src_login_server_id = 0;
    /**
     * <pre>
     * 记录消息发送者的HallServer ID
     * </pre>
     *
     * <code>int32 src_hall_server_id = 7;</code>
     */
    private $src_hall_server_id = 0;
    /**
     * <pre>
     * 记录消息发送者的TableServer ID
     * </pre>
     *
     * <code>int32 src_table_server_id = 8;</code>
     */
    private $src_table_server_id = 0;
    /**
     * <pre>
     * 游戏ID
     * </pre>
     *
     * <code>int32 game_id = 9;</code>
     */
    private $game_id = 0;

    public function __construct() {
        \GPBMetadata\Head::initOnce();
        parent::__construct();
    }

    /**
     * <pre>
     * 消息号
     * </pre>
     *
     * <code>int32 cmd = 1;</code>
     */
    public function getCmd()
    {
        return $this->cmd;
    }

    /**
     * <pre>
     * 消息号
     * </pre>
     *
     * <code>int32 cmd = 1;</code>
     */
    public function setCmd($var)
    {
        GPBUtil::checkInt32($var);
        $this->cmd = $var;
    }

    /**
     * <pre>
     * 消息内容，对应结构体
     * </pre>
     *
     * <code>bytes content = 2;</code>
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * <pre>
     * 消息内容，对应结构体
     * </pre>
     *
     * <code>bytes content = 2;</code>
     */
    public function setContent($var)
    {
        GPBUtil::checkString($var, False);
        $this->content = $var;
    }

    /**
     * <pre>
     * 错误码，0表示无错误
     * </pre>
     *
     * <code>int32 error_code = 3;</code>
     */
    public function getErrorCode()
    {
        return $this->error_code;
    }

    /**
     * <pre>
     * 错误码，0表示无错误
     * </pre>
     *
     * <code>int32 error_code = 3;</code>
     */
    public function setErrorCode($var)
    {
        GPBUtil::checkInt32($var);
        $this->error_code = $var;
    }

    /**
     * <pre>
     * 记录消息发送者的账号ID
     * </pre>
     *
     * <code>int32 src_account_id = 4;</code>
     */
    public function getSrcAccountId()
    {
        return $this->src_account_id;
    }

    /**
     * <pre>
     * 记录消息发送者的账号ID
     * </pre>
     *
     * <code>int32 src_account_id = 4;</code>
     */
    public function setSrcAccountId($var)
    {
        GPBUtil::checkInt32($var);
        $this->src_account_id = $var;
    }

    /**
     * <pre>
     * 记录消息发送者的角色ID
     * </pre>
     *
     * <code>int32 src_actor_id = 5;</code>
     */
    public function getSrcActorId()
    {
        return $this->src_actor_id;
    }

    /**
     * <pre>
     * 记录消息发送者的角色ID
     * </pre>
     *
     * <code>int32 src_actor_id = 5;</code>
     */
    public function setSrcActorId($var)
    {
        GPBUtil::checkInt32($var);
        $this->src_actor_id = $var;
    }

    /**
     * <pre>
     * 记录消息发送者的LoginServer ID
     * </pre>
     *
     * <code>int32 src_login_server_id = 6;</code>
     */
    public function getSrcLoginServerId()
    {
        return $this->src_login_server_id;
    }

    /**
     * <pre>
     * 记录消息发送者的LoginServer ID
     * </pre>
     *
     * <code>int32 src_login_server_id = 6;</code>
     */
    public function setSrcLoginServerId($var)
    {
        GPBUtil::checkInt32($var);
        $this->src_login_server_id = $var;
    }

    /**
     * <pre>
     * 记录消息发送者的HallServer ID
     * </pre>
     *
     * <code>int32 src_hall_server_id = 7;</code>
     */
    public function getSrcHallServerId()
    {
        return $this->src_hall_server_id;
    }

    /**
     * <pre>
     * 记录消息发送者的HallServer ID
     * </pre>
     *
     * <code>int32 src_hall_server_id = 7;</code>
     */
    public function setSrcHallServerId($var)
    {
        GPBUtil::checkInt32($var);
        $this->src_hall_server_id = $var;
    }

    /**
     * <pre>
     * 记录消息发送者的TableServer ID
     * </pre>
     *
     * <code>int32 src_table_server_id = 8;</code>
     */
    public function getSrcTableServerId()
    {
        return $this->src_table_server_id;
    }

    /**
     * <pre>
     * 记录消息发送者的TableServer ID
     * </pre>
     *
     * <code>int32 src_table_server_id = 8;</code>
     */
    public function setSrcTableServerId($var)
    {
        GPBUtil::checkInt32($var);
        $this->src_table_server_id = $var;
    }

    /**
     * <pre>
     * 游戏ID
     * </pre>
     *
     * <code>int32 game_id = 9;</code>
     */
    public function getGameId()
    {
        return $this->game_id;
    }

    /**
     * <pre>
     * 游戏ID
     * </pre>
     *
     * <code>int32 game_id = 9;</code>
     */
    public function setGameId($var)
    {
        GPBUtil::checkInt32($var);
        $this->game_id = $var;
    }

}

