<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$msg = new AMQPMessage('Ola mundo!');

$channel->basic_publish($msg, '', 'hello');

$channel->close();
$connection->close();