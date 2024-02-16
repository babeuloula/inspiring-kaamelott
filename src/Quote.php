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
class Quote
{
    /** Constructor is private to use only Quote::create method */
    private function __construct(
        public readonly string $quote,
        public readonly string $actor,
        public readonly string $character,
        public readonly string $season,
        public readonly string $episode,
    ) {
    }

    /** @param ?QuoteArray $data */
    public static function create(?array $data): self
    {
        if (null === $data) {
            throw new \InvalidArgumentException('$quote cannot be null.');
        }

        return new self(
            trim($data['quote']),
            trim($data['infos']['actor'] ?? ''),
            trim($data['infos']['character'] ?? ''),
            trim($data['infos']['season'] ?? ''),
            trim($data['infos']['episode'] ?? ''),
        );
    }
}
