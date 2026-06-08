<?php

declare(strict_types=1);

namespace TennisGame;

final class Player
{
    public int $score = 0;

    public function __construct(private readonly string $playerName) {
    }
}
