<?php

declare(strict_types=1);

namespace BaBeuloula\InspiringKaamelott\Tests;

use BaBeuloula\InspiringKaamelott\Inspiring;
use BaBeuloula\InspiringKaamelott\Quote;
use PHPUnit\Framework\TestCase;

class InspiringTest extends TestCase
{
    /** @test */
    public function getAQuote(): void
    {
        $quote = Inspiring::quote();

        static::assertInstanceOf(Quote::class, $quote);
        static::assertIsString($quote->quote);
        static::assertIsString($quote->actor);
        static::assertIsString($quote->character);
        static::assertIsString($quote->season);
        static::assertIsString($quote->episode);
    }

    /** @test */
    public function getAllQuotes(): void
    {
        $quotes = Inspiring::quotes();

        static::assertIsArray($quotes);

        foreach ($quotes as $quote) {
            static::assertInstanceOf(Quote::class, $quote);
            static::assertIsString($quote->quote);
            static::assertIsString($quote->actor);
            static::assertIsString($quote->character);
            static::assertIsString($quote->season);
            static::assertIsString($quote->episode);
        }
    }

    /** @test */
    public function getAConsoleQuote(): void
    {
        static::assertIsString(Inspiring::quoteForConsole());
    }
}
