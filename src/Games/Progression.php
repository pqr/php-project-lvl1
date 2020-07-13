<?php

namespace Brain\Games\Progression;

use function Brain\Engine\runGame;

use const Brain\Constants\ROUNDS_COUNT;

const MIN_RAND_START = 1;
const MAX_RAND_START = 50;
const MIN_RAND_STEP = 2;
const MAX_RAND_STEP = 15;
const PROGRESSION_LENGTH = 10;

const INTRODUCTION = 'What number is missing in the progression?';

function generateProgression($start, $step, $length)
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $start + $i * $step;
    }
    return $progression;
}

function runGameProgression()
{
    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {

        $start = random_int(MIN_RAND_START, MAX_RAND_START);
        $step = random_int(MIN_RAND_STEP, MAX_RAND_STEP);

        $progression = generateProgression($start, $step, PROGRESSION_LENGTH);
        $hiddenElementIndex = array_rand($progression);

        $correctAnswer = (string)$progression[$hiddenElementIndex];

        $progression[$hiddenElementIndex] = '..';
        $question = implode(' ', $progression);

        $gameData[] = [$question, $correctAnswer];
    }

    runGame(INTRODUCTION, $gameData);
}
