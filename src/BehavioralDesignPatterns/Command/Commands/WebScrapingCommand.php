<?php

namespace Raider\DesignPatternsPHP\BehavioralDesignPatterns\Command\Commands;

use Raider\DesignPatternsPHP\BehavioralDesignPatterns\Command\Invoker\Queue;

/**
 * The base web scraping Command defines the basic downloading infrastructure,
 * common to all concrete web scraping commands.
 */
abstract class WebScrapingCommand implements Command
{
    public int $id;

    public int $status = 0;

    public string $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getURL(): string
    {
        return $this->url;
    }

    /**
     * Since the execution methods for all web scraping commands are very
     * similar, we can provide a default implementation and let subclasses
     * override them if needed.
     *
     * Psst! An observant reader may spot another behavioral pattern in action
     * here.
     */
    public function execute(): void
    {
        $html = $this->download();
        $this->parse($html);
        $this->complete();
    }

    public function download(): string
    {
        $html = file_get_contents($this->getURL());
        echo "WebScrapingCommand: Downloaded {$this->url}" . PHP_EOL;

        return $html;
    }

    abstract public function parse(string $html): void;

    public function complete(): void
    {
        $this->status = 1;
        Queue::get()->completeCommand($this);
    }
}
