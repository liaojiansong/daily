<?php
/**
 *
 * @User: Jason
 * @Date: 2018/3/23
 */

//class MyClient extends Mosquitto\Client
//{
//    protected $pendingSubs = [];
//    protected $grantedSubs = [];
//    protected $subscribeCallback = null;
//
//    public function __construct($id = null, $cleanSession = false)
//    {
//        parent::__construct($id, $cleanSession);
//        parent::onSubscribe(array($this, 'subscribeHandler'));
//    }
//
//    public function subscribeHandler($mid, $qosCount, $grantedQos)
//    {
//        if (!isset($this->pendingSubs[$mid])) {
//            return;
//        }
//        $topic = $this->pendingSubs[$mid];
//        $this->grantedSubs[$topic] = $grantedQos;
//        echo "Subscribed to topic {$topic} with message ID {$mid}\n";
//        if (is_callable($this->subscribeCallback)) {
//            $this->subscribeCallback($mid, $qosCount, $grantedQos);
//        }
//    }
//
//    public function subscribe($topic, $qos)
//    {
//        $mid = parent::subscribe($topic, $qos);
//        $this->pendingSubs[$mid] = $topic;
//    }
//
//    public function onSubscribe(callable $callable)
//    {
//        $this->subscribeHandler = $callable;
//    }
//
//    public function getSubscriptions()
//    {
//        return $this->grantedSubs;
//    }
//}
//
//$c = new MyClient('subscriptionTest');
//$c->onSubscribe(function () {
//    echo "Hello, I got subscribed\n";
//});
//$c->connect('localhost', 1883, 50);
//$c->subscribe('jason', 1);
//for ($i = 0; $i < 5; $i++) {
//    $c->loop(10);
//}
//var_dump($c->getSubscriptions());
$c = new Mosquitto\Client;
$c->setCredentials('test', '123123');
$c->connect('127.0.0.1', 1883, 50);
$c->subscribe('jason', 1);
$c->onMessage(function($m) {
    var_dump($m);
});
$c->loopForever();