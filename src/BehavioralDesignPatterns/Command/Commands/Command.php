<?php

namespace Raider\DesignPatternsPHP\BehavioralDesignPatterns\Command\Commands;

/**
 * The Command interface declares the main execution method as well as several
 * helper methods for retrieving a command's metadata.
 */
interface Command
{
    public function execute(): void;

    public function getId(): int;

    public function getStatus(): int;
}
