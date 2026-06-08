<?php

declare(strict_types=1);

namespace TennisGame;

class TennisGame2 implements TennisGame
{
    private int $P1point = 0;

    private int $P2point = 0;

    private string $P1res = '';

    private string $P2res = '';

    public function getScore(): string
    {
        $score = '';
        $player1Result = '';
        $player2Result = '';

        if ($this->P1point === $this->P2point && $this->P1point < 4) {
            $score = $this->getEqualScore();
        }

        if ($this->P1point === $this->P2point && $this->P1point >= 3) {
            $score = 'Deuce';
        }

        if ($this->P1point > 0 && $this->P2point === 0) {
            if ($this->P1point === 1) {
                $player1Result = 'Fifteen';
            }
            if ($this->P1point === 2) {
                $player1Result = 'Thirty';
            }
            if ($this->P1point === 3) {
                $player1Result = 'Forty';
            }

            $player2Result = 'Love';
            $score = "{$player1Result}-{$player2Result}";
        }

        if ($this->P2point > 0 && $this->P1point === 0) {
            if ($this->P2point === 1) {
                $player2Result = 'Fifteen';
            }
            if ($this->P2point === 2) {
                $player2Result = 'Thirty';
            }
            if ($this->P2point === 3) {
                $player2Result = 'Forty';
            }
            $player1Result = 'Love';
            $score = "{$player1Result}-{$player2Result}";
        }

        if ($this->P1point > $this->P2point && $this->P1point < 4) {
            if ($this->P1point === 2) {
                $player1Result = 'Thirty';
            }
            if ($this->P1point === 3) {
                $player1Result = 'Forty';
            }
            if ($this->P2point === 1) {
                $player2Result = 'Fifteen';
            }
            if ($this->P2point === 2) {
                $player2Result = 'Thirty';
            }
            $score = "{$player1Result}-{$player2Result}";
        }

        if ($this->P2point > $this->P1point && $this->P2point < 4) {
            if ($this->P2point === 2) {
                $player2Result = 'Thirty';
            }
            if ($this->P2point === 3) {
                $player2Result = 'Forty';
            }
            if ($this->P1point === 1) {
                $player1Result = 'Fifteen';
            }
            if ($this->P1point === 2) {
                $player1Result = 'Thirty';
            }
            $score = "{$player1Result}-{$player2Result}";
        }

        if ($this->P1point > $this->P2point && $this->P2point >= 3) {
            $score = 'Advantage player1';
        }

        if ($this->P2point > $this->P1point && $this->P1point >= 3) {
            $score = 'Advantage player2';
        }

        if ($this->P1point >= 4 && $this->P2point >= 0 && ($this->P1point - $this->P2point) >= 2) {
            $score = 'Win for player1';
        }

        if ($this->P2point >= 4 && $this->P1point >= 0 && ($this->P2point - $this->P1point) >= 2) {
            $score = 'Win for player2';
        }

        return $score;
    }

    public function wonPoint(string $player): void
    {
        if ($player === 'player1') {
            $this->P1Score();
        } else {
            $this->P2Score();
        }
    }

    /**
     * @return string
     */
    public function getEqualScore(): string
    {
        $score = '';

        if ($this->P1point === 0) {
            $score = 'Love';
        }

        if ($this->P1point === 1) {
            $score = 'Fifteen';
        }

        if ($this->P1point === 2) {
            $score = 'Thirty';
        }

        $score .= '-All';

        return $score;
    }

    private function SetP1Score(int $number): void
    {
        for ($i = 0; $i < $number; $i++) {
            $this->P1Score();
        }
    }

    private function SetP2Score(int $number): void
    {
        for ($i = 0; $i < $number; $i++) {
            $this->P2Score();
        }
    }

    private function P1Score(): void
    {
        $this->P1point++;
    }

    private function P2Score(): void
    {
        $this->P2point++;
    }
}
