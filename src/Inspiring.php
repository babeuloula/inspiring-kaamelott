<?php

declare(strict_types=1);

namespace BaBeuloula\InspiringKaamelott;

/**
 * @phpstan-type QuoteArray = array{
 *     quote: string,
 *     infos: array{
 *          actor: ?string,
 *          character: ?string,
 *          season: ?string,
 *          episode: ?string
 *     }
 * }
 */
class Inspiring
{
    /** Get an inspiring quote from Kaamelott. */
    public static function quote(): Quote
    {
        $quotes = static::quotes();
        shuffle($quotes);
        $quote = array_shift($quotes);

        if (null === $quote) {
            throw new \InvalidArgumentException("Unable to get quote.");
        }

        return $quote;
    }

    /** Get an inspiring quote from Kaamelott. */
    public static function quoteForConsole(): string
    {
        return static::formatForConsole(static::quote());
    }

    /**
     * Get the collection of inspiring quotes.
     *
     * @return Quote[]
     */
    public static function quotes(): array
    {
        /** @var QuoteArray[] $quotes */
        $quotes = require(__DIR__ . '/Kaamelott.php');

        return array_map(
            /** @param QuoteArray $data */
            static fn (array $data): Quote => Quote::create($data),
            $quotes,
        );
    }

    /** Formats the given quote for a pretty console output. */
    protected static function formatForConsole(Quote $quote): string
    {
        return sprintf(
            "\n  <options=bold>“ %s ”</>\n  <fg=gray>— %s (%s - %s)</>\n",
            $quote->quote,
            $quote->character,
            $quote->season,
            $quote->episode,
        );
    }
}
