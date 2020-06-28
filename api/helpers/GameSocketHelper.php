<?php

namespace api\helpers;

use yii\base\Exception;

class GameSocketHelper
{
    public static $KEY="longcitywebonline12345678901234567890";

    /**
     * 通知游戏执行GM命令
     * @param $port master端口
     * @param $info GM命令
     * @return string 游戏返回消息｜异常消息
     */
    public static function send($port,$info)
    {
        try
        {
            $socket = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
            $result = socket_connect($socket,'127.0.0.1',$port);
            $in = md5($info.self::$KEY).$info."\n";
            socket_write($socket,$in,strlen($in));
            $out = trim(socket_read($socket,1024));
            socket_close($socket);
            return $out;
        }catch (Exception $exception)
        {
            return $exception->getMessage();
        }
    }
}