<?php

namespace Brain\Games\Calc;

use function Brain\Engine\gameLogic;
use function cli\line;
use function cli\prompt;

const DESCRIPTION = 'What is the result of the expression?';
const RANDOM_MAX = 10;

function calculate($firstNumber, $secondNumber, $sign)
{
    switch ($sign) {
        case '+':
            return $firstNumber + $secondNumber;
        case '-':
            return $firstNumber - $secondNumber;
        case '*':
            return $firstNumber * $secondNumber;
        default:
            throw new Exception('Not this is: {$sign}!');
    }
}

function play()
{
    $generateGameData = function () {
        $firstNumber = rand(0, RANDOM_MAX);
        $secondNumber = rand(0, RANDOM_MAX);
        $mapSign = ['+', '-', '*'];
        $sign = $mapSign[array_rand($mapSign)];
        $question = "{$firstNumber}{$sign}{$secondNumber}";
        $answer = (string)(calculate($firstNumber, $secondNumber, $sign));

        return [$question, $answer];
    };

    gameLogic(DESCRIPTION, $generateGameData);
}
