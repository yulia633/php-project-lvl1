<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\runGame;
use function cli\line;
use function cli\prompt;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';
const RANDOM_MIN = 1;
const RANDOM_MAX = 100;

function isEven($number)
{
    return $number % 2 === 0;
}

function getAnswer($question)
{
    $answer = isEven($question) ? 'yes' : 'no';
    return $answer;
}

function play()
{
    $generateGameData = function () {
        $question = rand(RANDOM_MIN, RANDOM_MAX);
        $answer = getAnswer($question);

        return [$question, $answer];
    };

    runGame(DESCRIPTION, $generateGameData);
}
