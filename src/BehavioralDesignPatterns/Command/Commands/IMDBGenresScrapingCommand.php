<?php

namespace Raider\DesignPatternsPHP\BehavioralDesignPatterns\Command\Commands;

use Raider\DesignPatternsPHP\BehavioralDesignPatterns\Command\Invoker\Queue;

/**
 * The Concrete Command for scraping the list of movie genres.
 */
class IMDBGenresScrapingCommand extends WebScrapingCommand
{
    public function __construct(string $url = '')
    {
        parent::__construct($url);
        $this->url = "https://www.imdb.com/feature/genre/";
    }

    /**
     * Extract all genres and their search URLs from the page:
     * https://www.imdb.com/feature/genre/
     */
    public function parse($html): void
    {
        preg_match_all("|href=\"/search/title/\?genres=(.*?)&.*?title_type=movie|", $html, $matches);
        echo "IMDBGenresScrapingCommand: Discovered " . count($matches[1]) . " genres." . PHP_EOL;
        echo PHP_EOL;

        foreach ($matches[1] as $genre) {
            $genreUrl = "https://www.imdb.com/search/title/?title_type=feature&genres={$genre}";
            Queue::get()->add(new IMDBGenrePageScrapingCommand($genreUrl));
        }
    }
}
