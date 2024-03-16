<?php

use Raider\DesignPatternsPHP\BehavioralDesignPatterns\Command\Commands\IMDBGenresScrapingCommand;
use Raider\DesignPatternsPHP\BehavioralDesignPatterns\Command\Invoker\Queue;

require_once __DIR__ . '/../../../vendor/autoload.php';

/**
 * The client code.
 */

$queue = Queue::get();

if ($queue->isEmpty()) {
    $queue->add(new IMDBGenresScrapingCommand());
}

$queue->work();
