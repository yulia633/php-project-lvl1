<?php

namespace Brain\Games\Progression;

use function Brain\Engine\gameLogic;
use function cli\line;
use function cli\prompt;

const DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;
const RANDOM_MIN = 1;
const RANDOM_MAX = 10;

function generateProgression($start, $step, $progressionLength)
{
    $progression = [];
    for ($i = 0; $i < $progressionLength; $i += 1) {
        $progression[] = $start + $step * $i;
    }
    return $progression;
}

function play()
{
    $generateGameData = function () {
        $start = rand(RANDOM_MIN, RANDOM_MAX);
        $step = rand(RANDOM_MIN, RANDOM_MAX);
        $progression = generateProgression($start, $step, PROGRESSION_LENGTH);
        $hiddenElementIndex = rand(0, PROGRESSION_LENGTH - 1);
        $answer = $progression[$hiddenElementIndex];
        $progression[$hiddenElementIndex] = '..';
        $question = implode($progression, ' ');

        return [$question, "{$answer}"];
    };

    gameLogic(DESCRIPTION, $generateGameData);
}
