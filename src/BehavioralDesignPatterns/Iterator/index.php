<?php

use Raider\DesignPatternsPHP\BehavioralDesignPatterns\Iterator\Iterator\CsvIterator;

require_once __DIR__ . '/../../../vendor/autoload.php';

/**
 * The client code.
 */
$csv = new CsvIterator(__DIR__ . '/cats.csv');

foreach ($csv as $key => $row) {
    print_r($row);
}