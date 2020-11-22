<?php
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
session_start();
require ('../includes.php');
require __DIR__ . '/../vendor/autoload.php';

$api = new ApiContext
(new OAuthTokenCredential(
"AWXF461wThiBla29SzeeTefxboVASdiiLAfhM58SaMkImIW4bdvhxFrK2TSeNvsDr62H49UKCSsW3UWg",
"EElnI5nc7drBGyPnnpha9GV2kDm6osSTFa5bJzZaN-IqGC5jDtLfBzE31MbQbbKIaYyqLw87ff1bf8IO"
)
);
$api->setConfig([
'mode' => "sandbox",
'http.ConnectionTimePut' => 30,
'log.logEnabled' => false,
'log.FileName' => '',
'log.LogLevel' => 'FINE',
'validation.level' => 'log'
]);
