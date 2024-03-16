<?php

namespace Raider\DesignPatternsPHP\BehavioralDesignPatterns\Command\Commands;

/**
 * The Concrete Command for scraping the movie details.
 */
class IMDBMovieScrapingCommand extends WebScrapingCommand
{
    /**
     * Get the movie info from a page like this:
     * https://www.imdb.com/title/tt15314262/?ref_=sr_t_14
     */
    public function parse(string $html): void
    {
        $title = "";
        if (preg_match("|<h1[^>]*class=\"[^\"]*\"[^>]*>\s*<span[^>]*class=\"[^\"]*\"[^>]*>(.*?)</span>|", $html, $matches)) {
            $title = $matches[1];
        }
        echo "IMDBMovieScrapingCommand: Parsed movie $title." . PHP_EOL;
        echo PHP_EOL;
    }
}
