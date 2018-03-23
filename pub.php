<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/17
 * Time: 21:36
 */

$client = new Mosquitto\Client();
$client->onConnect('connect');
$client->onDisconnect('disconnect');
$client->onSubscribe('subscribe');
$client->onMessage('message');
$client->connect("127.0.0.1", 1883, 5);
$client->subscribe('jason', 1);
while (true) {
    $client->loop();
    $mid = $client->publish('/hello', "Hello from PHP at " . date('Y-m-d H:i:s'), 1, 0);
    echo "Sent message ID: {$mid}\n";
    $client->loop();
    sleep(2);
}
$client->disconnect();
unset($client);
function connect($r)
{
    echo "我是连接成功时的回调函数,服务器响应代码为{$r}\n";
}

function subscribe()
{
    echo "服务器了我的响应订阅请求,所以我被调用了 to a topic\n";
}

function message($message)
{
    printf("收到一条消息 %d 来自主体 %s 消息体是:\n%s\n\n", $message->mid, $message->topic, $message->payload);
}

function disconnect($rc)
{
    echo "哎呀,连接断开了,服务器响应代码为{$rc}\n";
}