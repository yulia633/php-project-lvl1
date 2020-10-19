<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

const CORRECT_ANSWER = 3;

function gameLogic($gameConditionsEven, $generateGameData)
{
    line("Welcome to the Brain Games! \n");
    line($gameConditionsEven);
    $name = prompt("May I have your name?");
    line("Hello, {$name}!");

    for ($i = 1; $i <= CORRECT_ANSWER; $i += 1) {
        [$question, $answer] = $generateGameData();

        line("Question: {$question}");
        $currentAnswer = prompt("Your answer");

        if ($currentAnswer === $answer) {
            line("Correct!");
            continue;
        } else {
            line("'{$currentAnswer}' is wrong answer ;(. Correct answer was '{$answer}'");
            line("Let`s try again, {$name}!");
            return;
        }
    }

    return line("Congratulations, {$name}!");
}
