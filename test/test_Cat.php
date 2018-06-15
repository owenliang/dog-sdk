<?php

require_once __DIR__ . '/../vendor/autoload.php';

$context= new \cat\Context();

$context->domain = 'mickey.sdk';
$context->hostname = gethostname();
$context->ip = "127.0.0.1";

$manager = new \cat\Manager(['routerApi' => 'http://cat-itoamms.smzdm.com/cat/s/router']);
$producer = new \cat\Producer($manager);
$manager->setServerContext($context);

$context->catChildMessageId = $manager->generateMessageId();

$producer->startTransaction('URL', '/api/look11');

$producer->logEvent('FROM', 'Request.from', '	/api/look <= api.smzdm.com/v1/util/map/geocode');

$producer->endTransaction();