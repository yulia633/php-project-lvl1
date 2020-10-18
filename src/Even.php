<?php

namespace Brain\Even;

use function cli\line;
use function cli\prompt;

const GAME_CONDITIONS_EVEN = 'Answer "yes" if number even otherwise answer "no".';
const CORRECT_ANSWER = 3;
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
    $dataAttributes = function () {       
        $question = getRandomNumber();
        $answer = getAnswer($question);

        return [$question, $answer];
    };

    gameLogic(GAME_CONDITIONS_EVEN, $dataAttributes);
    return;
}

function gameLogic($gameConditionsEven, $dataAttributes)
{
    line("Welcome to the Brain Games! \n");
    line($gameConditionsEven);    
    $name = prompt("May I have your name?");    
    line("Hello, {$name}!");

    for ($i = 1; $i <= CORRECT_ANSWER; $i += 1) {
        [$question, $answer] = $dataAttributes();

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

