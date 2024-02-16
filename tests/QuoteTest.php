<?php

declare(strict_types=1);

namespace BaBeuloula\InspiringKaamelott\Tests;

use BaBeuloula\InspiringKaamelott\Quote;
use PHPUnit\Framework\TestCase;

class QuoteTest extends TestCase
{
    /** @test */
    public function returnQuoteInstance(): void
    {
        $quote = Quote::create(
            [
                'quote' => 'Foo quote',
                'infos' => [
                    'actor' => 'Foo actor',
                    'character' => 'Foo character',
                    'season' => 'Foo season',
                    'episode' => 'Foo episode',
                ],
            ],
        );

        static::assertInstanceOf(Quote::class, $quote);
        static::assertSame('Foo quote', $quote->quote);
        static::assertSame('Foo actor', $quote->actor);
        static::assertSame('Foo character', $quote->character);
        static::assertSame('Foo season', $quote->season);
        static::assertSame('Foo episode', $quote->episode);
    }

    public function throwOnEmptyQuote(): void
    {
        static::expectException(\InvalidArgumentException::class);
        static::expectExceptionMessage('$quote cannot be null.');

        Quote::create(null);
    }
}
