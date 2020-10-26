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

    $playerAnswerCorrect = true;

    for ($correctAnswersCount = 1; $correctAnswersCount <= ROUND_COUNT; $correctAnswersCount += 1) {
        [$question, $answer] = $generateGameData();

        line("Question: {$question}");
        $playerAnswer = prompt("Your answer");
        $playerAnswerCorrect = $playerAnswer === $answer;

        $playerAnswerCorrect ?
        line("Correct!") :
        line("'{$playerAnswer}' is wrong answer ;(. Correct answer was '{$answer}'");
        
        if (!$playerAnswerCorrect) {
            break;
        }
    }

    $playerAnswerCorrect ?
        line("Congratulations, {$name}!") :
        line("Let`s try again, {$name}!");
}
