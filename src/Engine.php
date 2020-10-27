<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUND_COUNT = 3;

function runGame(string $description, object $generateGameData)
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, {$name}!");
    line($description);

    if (empty($generateGameData)) {
        return null;
    }
    
    for ($correctAnswersCount = 1; $correctAnswersCount <= ROUND_COUNT; $correctAnswersCount += 1) {
        [$question, $answer] = $generateGameData();
        
        line("Question: {$question}");
        $playerAnswer = prompt("Your answer");

        if ($playerAnswer !== $answer) {
            line("'{$playerAnswer}' is wrong answer ;(. Correct answer was '{$answer}'");
            line("Let`s try again, {$name}!");
            return;
        }

        line("Correct!");
    }
        
    line("Congratulations, {$name}!");
}
