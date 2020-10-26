<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUND_COUNT = 3;

function runGame($description, $generateGameData)
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, {$name}!");
    line($description);

    for ($i = 1; $i <= ROUND_COUNT; $i += 1) {
        [$question, $answer] = $generateGameData();

        line("Question: {$question}");
        $playerAnswer = prompt("Your answer");

        if ($playerAnswer === $answer) {
            line("Correct!");
            continue;
        } else {
            line("'{$playerAnswer}' is wrong answer ;(. Correct answer was '{$answer}'");
            line("Let`s try again, {$name}!");
            return;
        }
    }

    line("Congratulations, {$name}!");
}
