<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/17
 * Time: 22:31
 */
//$redis = new Redis();
//$redis->connect('127.0.0.1');
$c = new Mosquitto\Client;
//$c->setCredentials('test', '123123');
$c->connect('120.78.78.42', 1883, 50);
$c->subscribe('ss', 1);
$c->onMessage(function($m)use ($redis) {
    var_dump($m);
//    $redis->lPush('mesg',$m['mid'] )/\;
    echo "\n";
});
$c->loopForever();