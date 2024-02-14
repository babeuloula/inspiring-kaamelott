<?php

declare(strict_types=1);

namespace BaBeuloula\InspiringKaamelott;

class Inspiring
{
    /** Get an inspiring quote from Kaamelott. */
    public static function quote(): string
    {
        $quotes = static::quotes();
        shuffle($quotes);

        return static::formatForConsole(array_shift($quotes));
    }

    /** Get the collection of inspiring quotes. */
    public static function quotes(): array
    {
        return require_once(__DIR__.'/Kaamelott.php');
    }

    /** Formats the given quote for a pretty console output. */
    protected static function formatForConsole(array $quote): string
    {
        $text = $quote['citation'];
        $character = $quote['infos']['personnage'] ?? '';
        $season = $quote['infos']['saison'] ?? '';
        $episode = $quote['infos']['episode'] ?? '';


        return sprintf(
            "\n  <options=bold>“ %s ”</>\n  <fg=gray>— %s (%s - %s)</>\n",
            trim($text),
            trim($character),
            trim($season),
            trim($episode),
        );
    }
}
