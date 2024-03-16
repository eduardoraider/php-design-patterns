<?php

namespace Raider\DesignPatternsPHP\BehavioralDesignPatterns\Command\Commands;

use Raider\DesignPatternsPHP\BehavioralDesignPatterns\Command\Invoker\Queue;

/**
 * The Concrete Command for scraping the list of movies in a specific genre.
 */
class IMDBGenrePageScrapingCommand extends WebScrapingCommand
{

    public function __construct(string $url)
    {
        parent::__construct($url);
    }

    public function getURL(): string
    {
        return $this->url;
    }

    /**
     * Extract all movies from a page like this:
     * https://www.imdb.com/search/title/?title_type=feature&genres=action
     */
    public function parse(string $html): void
    {
        preg_match_all("|<a\s+href=\"(/title/.*?/\?ref_=sr_t_.*?)\"|", $html, $matches);
        echo "IMDBGenrePageScrapingCommand: Discovered " . count($matches[1]) . " movies." . PHP_EOL;
        echo PHP_EOL;

        foreach ($matches[1] as $moviePath) {
            $url = "https://www.imdb.com" . $moviePath;
           Queue::get()->add(new IMDBMovieScrapingCommand($url));
        }
    }
}