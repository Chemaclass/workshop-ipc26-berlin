<?php

namespace TennisGame;

enum Score
{
    case Love;
    case Fifteen;
    case Thirty;
    case Forty;

    public static function fromInt(int $score): self
    {
        return match ($score) {
            0 => self::Love,
            1 => self::Fifteen,
            2 => self::Thirty,
            3 => self::Forty,
            default => throw new \Exception('Invalid score'),
        };
    }
}
