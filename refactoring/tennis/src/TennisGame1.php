<?php

declare(strict_types=1);

namespace TennisGame;

class TennisGame1 implements TennisGame
{
    private int $score1 = 0;

    private int $score2 = 0;

    public function __construct(
        private string $player1Name,
        private string $player2Name
    ) {
    }

    public function wonPoint(string $playerName): void
    {
        if ($playerName === $this->player1Name) {
            $this->score1++;
        } else {
            $this->score2++;
        }
    }

    public function getScore(): string
    {
        if ($this->score1 === $this->score2) {
            return $this->tiedScore();
        }
        if ($this->score1 >= 4 || $this->score2 >= 4) {
            return $this->endgameScore();
        }
        return $this->runningScore();
    }

    private function tiedScore(): string
    {
        return $this->score1 >= 3
            ? 'Deuce'
            : $this->pointName($this->score1) . '-All';
    }

    private function endgameScore(): string
    {
        $lead = $this->score1 - $this->score2;
        return match (true) {
            $lead === 1 => 'Advantage ' . $this->player1Name,
            $lead === -1 => 'Advantage ' . $this->player2Name,
            $lead >= 2 => 'Win for ' . $this->player1Name,
            default => 'Win for ' . $this->player2Name,
        };
    }

    private function runningScore(): string
    {
        return $this->pointName($this->score1) . '-' . $this->pointName($this->score2);
    }

    private function pointName(int $score): string
    {
        return match ($score) {
            0 => 'Love',
            1 => 'Fifteen',
            2 => 'Thirty',
            3 => 'Forty',
        };
    }
}
