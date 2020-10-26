<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\gameLogic;
use function cli\line;
use function cli\prompt;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const RANDOM_MIN = 2;
const RANDOM_MAX = 20;

function isPrime($number)
{
    if ($number < 2) {
        return false;
    }

    $iter = function ($divider) use ($number, &$iter) {
        if ($divider ** 2 <= $number) {
            if ($number % $divider === 0) {
                    return false;
            }
            return $iter($divider + 1);
        }
        
        return true;
    };
    return $iter(2);
}

function getAnswer($question)
{
    return isPrime($question) ? 'yes' : 'no';
}

function play()
{
    $generateGameData = function () {
        $question = rand(RANDOM_MIN, RANDOM_MAX);
        $answer = getAnswer($question);

        return [$question, $answer];
    };

    gameLogic(DESCRIPTION, $generateGameData);
}
