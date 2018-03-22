<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/3/10
 * Time: 下午5:56
 */

namespace App\Utility;


use EasySwoole\Config;
use EasySwoole\Core\Swoole\Coroutine\AbstractInterface\CoroutinePool;
use EasySwoole\Core\Swoole\Coroutine\Client\Mysql;


class MysqlPool2 extends CoroutinePool
{

    function __construct()
    {
        $conf = Config::getInstance()->getConf('MYSQL');
        $max = $conf['MAX'];
        $min = $conf['MIN'];

        parent::__construct($min, $max);
    }

    function getObj($timeOut = 0.1):?Mysql
    {
        return parent::getObj($timeOut); // TODO: Change the autogenerated stub
    }

    protected function createObject()
    {
        // TODO: Implement createObject() method.
        $conf = Config::getInstance()->getConf('MYSQL');
        $db = new Mysql([
            'host' => $conf['HOST'],
            'port' => $conf['PORT'],
            'username' => $conf['USER'],
            'password' => $conf['PASSWORD'],
            'db' => $conf['DB_NAME']
        ]);
        return $db;
    }
}