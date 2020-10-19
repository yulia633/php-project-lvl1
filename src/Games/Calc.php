<?php

namespace Brain\Games\Calc;

use function Brain\Engine\gameLogic;
use function cli\line;
use function cli\prompt;

const DESCRIPTION = 'What is the result of the expression?';
const MAP_SIGN = ['+', '-', '*'];
const RANDOM_MAX = 10;

function calculate($firstNumber, $secondNumber, $sign)
{
    switch ($sign) {
        case '+':
            return $firstNumber + $secondNumber;
            break;
        case '-':
            return $firstNumber - $secondNumber;
            break;
        case '*':
            return $firstNumber * $secondNumber;
            break;
        default:
            throw new Error('Not this is: {$sign}!');
    }
}

function getRandomNumber()
{
    return rand(0, RANDOM_MAX);
}

function play()
{
    $generateGameData = function () {
        $firstNumber = getRandomNumber();
        $secondNumber = getRandomNumber();
        $sign = MAP_SIGN[array_rand(MAP_SIGN)];
        $question = "{$firstNumber}{$sign}{$secondNumber}";
        $answer = (string)(calculate($firstNumber, $secondNumber, $sign));

        return [$question, $answer];
    };

    gameLogic(DESCRIPTION, $generateGameData);
    return;
}
