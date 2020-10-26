<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\runGame;
use function cli\line;
use function cli\prompt;

const DESCRIPTION = 'What is the result of the expression?';
const RANDOM_MIN = 0;
const RANDOM_MAX = 10;

function calculate(int $firstNumber, int $secondNumber, string $sign)
{
    switch ($sign) {
        case '+':
            return $firstNumber + $secondNumber;
        case '-':
            return $firstNumber - $secondNumber;
        case '*':
            return $firstNumber * $secondNumber;
        default:
            throw new Exception('There is no such operator: {$sign}.');
    }
}

function play()
{
    $generateGameData = function () {
        $firstNumber = rand(RANDOM_MIN, RANDOM_MAX);
        $secondNumber = rand(RANDOM_MIN, RANDOM_MAX);
        $mapSign = ['+', '-', '*'];
        $sign = $mapSign[array_rand($mapSign)];
        $question = "{$firstNumber}{$sign}{$secondNumber}";
        $answer = (string)(calculate($firstNumber, $secondNumber, $sign));

        return [$question, $answer];
    };

    runGame(DESCRIPTION, $generateGameData);
}
