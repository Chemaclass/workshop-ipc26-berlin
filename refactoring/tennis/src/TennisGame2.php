<?php

declare(strict_types=1);

namespace TennisGame;

class TennisGame2 implements TennisGame
{
    private int $player1Score = 0;

    private int $player2Score = 0;

    public function getScore(): string
    {
        $score = '';
        $player1Result = '';
        $player2Result = '';

        if ($this->player1Score === $this->player2Score && $this->player1Score < 4) {
            $score = $this->getEqualScore();
        }

        if ($this->player1Score === $this->player2Score && $this->player1Score >= 3) {
            $score = 'Deuce';
        }

        if (($this->player1Score > 0 && $this->player2Score === 0) || ($this->player1Score === 0 && $this->player2Score > 0)) { // TODO
            $player2Result = $this->getPlayerScore($this->player2Score);
            $player1Result = $this->getPlayerScore($this->player1Score);
            $score = "{$player1Result}-{$player2Result}";
        }

        if ($this->player1Score > $this->player2Score && $this->player1Score < 4) {
            if ($this->player1Score === 2) {
                $player1Result = 'Thirty';
            }
            if ($this->player1Score === 3) {
                $player1Result = 'Forty';
            }
            if ($this->player2Score === 1) {
                $player2Result = 'Fifteen';
            }
            if ($this->player2Score === 2) {
                $player2Result = 'Thirty';
            }
            $score = "{$player1Result}-{$player2Result}";
        }

        if ($this->player2Score > $this->player1Score && $this->player2Score < 4) {
            if ($this->player2Score === 2) {
                $player2Result = 'Thirty';
            }
            if ($this->player2Score === 3) {
                $player2Result = 'Forty';
            }
            if ($this->player1Score === 1) {
                $player1Result = 'Fifteen';
            }
            if ($this->player1Score === 2) {
                $player1Result = 'Thirty';
            }
            $score = "{$player1Result}-{$player2Result}";
        }

        if ($this->player1Score > $this->player2Score && $this->player2Score >= 3) {
            $score = 'Advantage player1';
        }

        if ($this->player2Score > $this->player1Score && $this->player1Score >= 3) {
            $score = 'Advantage player2';
        }

        if ($this->player1Score >= 4 && $this->player2Score >= 0 && ($this->player1Score - $this->player2Score) >= 2) {
            $score = 'Win for player1';
        }

        if ($this->player2Score >= 4 && $this->player1Score >= 0 && ($this->player2Score - $this->player1Score) >= 2) {
            $score = 'Win for player2';
        }

        return $score;
    }

    public function wonPoint(string $player): void
    {
        if ($player === 'player1') {
            $this->player1Score++;
        } else {
            $this->player2Score++;
        }
    }

    /**
     * @return string
     */
    public function getEqualScore(): string
    {
        $score = '';

        if ($this->player1Score === 0) {
            $score = 'Love';
        }

        if ($this->player1Score === 1) {
            $score = 'Fifteen';
        }

        if ($this->player1Score === 2) {
            $score = 'Thirty';
        }

        $score .= '-All';

        return $score;
    }

    private function getPlayerScore(int $score): string
    {
        if ($score === 0) {
            return 'Love';
        }

        if ($score === 1) {
            return 'Fifteen';
        }

        if ($score === 2) {
            return 'Thirty';
        }

        if ($score === 3) {
            return 'Forty';
        }

        return '';
    }
}
