<?php

declare(strict_types=1);

namespace KataTests;

use Kata\Game;
use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;

final class ChangeMeTest extends TestCase
{

        // Train your brain to do the small stupid things

        // Programming by wishful thinking

    #[TestWith(['rock', 'scissors', 'Player 1'])]
    #[TestWith(['scissors', 'rock', 'Player 2'])]
    public function test_rock_beats_scissors(string $player1Choice, string $player2Choice, string $expectedWinner): void
    {
        $game = new Game();

        self::assertSame(
            $game->play($player1Choice, $player2Choice),
            $expectedWinner
        );
    }

    #[TestWith(['scissors', 'paper', 'Player 1'])]
    #[TestWith(['paper', 'scissors', 'Player 2'])]
    public function test_scissors_beats_paper(string $player1Choice, string $player2Choice, string $expectedWinner): void
    {
        $game = new Game();

        self::assertSame(
            $game->play($player1Choice, $player2Choice),
            $expectedWinner
        );
    }



    #[TestWith(['rock', 'paper', 'Player 2'])]
    #[TestWith(['paper', 'rock', 'Player 1'])]
    public function test_paper_beats_rock(string $player1Choice, string $player2Choice, string $expectedWinner): void
    {
        $game = new Game();

        self::assertSame(
            $game->play($player1Choice, $player2Choice),
            $expectedWinner
        );
    }

    #[TestWith(['rock', 'rock'])]
    #[TestWith(['paper', 'paper'])]
    #[TestWith(['scissors', 'scissors'])]
    public function test_same_moves_result_in_draw(string $player1Choice, string $player2Choice): void
    {
        $game = new Game();

        self::assertSame(
            $game->play($player1Choice, $player2Choice),
            'Draw'
        );
    }
}
