<?php

namespace Brain\Games\Even;

use function Brain\Engine\gameLogic;
use function cli\line;
use function cli\prompt;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';
const RANDOM_MIN = 1;
const RANDOM_MAX = 100;

function isEven($number)
{
    return $number % 2 === 0 ? true : false;
}

function getAnswer($question)
{
    $answer = isEven($question) ? 'yes' : 'no';
    return $answer;
}

function getRandomNumber()
{
    return rand(RANDOM_MIN, RANDOM_MAX);
}

function play()
{
    $generateGameData = function () {
        $question = getRandomNumber();
        $answer = getAnswer($question);

        return [$question, $answer];
    };

    gameLogic(DESCRIPTION, $generateGameData);
    return;
}
