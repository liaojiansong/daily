<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/17
 * Time: 21:36
 */


$client = new Mosquitto\Client();
$client->setCredentials('root', 'Liao325339');
$client->connect("120.78.78.42", 1883, 5);

while (true){
    $client->loop();
    $str = "小松果在" . date('Y-m-d H:i:s') . '对你说:你好啊';
    $mid = $client->publish('ss', $str, 1, 0);
    echo $str.$mid."\n";
    $client->loop();
    sleep(2);
}