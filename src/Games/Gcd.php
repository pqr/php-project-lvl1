<?php

namespace Brain\Games\Gcd;

use function Brain\Engine\runGame;

use const Brain\Constants\ROUNDS_COUNT;

const MIN_RAND_NUMBER = 2;
const MAX_RAND_NUMBER = 100;

const INTRODUCTION = 'Find the greatest common divisor of given numbers.';

function runGameGcd()
{
    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $number1 = random_int(MIN_RAND_NUMBER, MAX_RAND_NUMBER);
        $number2 = random_int(MIN_RAND_NUMBER, MAX_RAND_NUMBER);

        $question = "$number1 $number2";
        $correctAnswer = (string)getGcd($number1, $number2);

        $gameData[] = [$question, $correctAnswer];
    }

    runGame(INTRODUCTION, $gameData);
}

function getGcd($number1, $number2)
{
    if ($number2) {
        return getGcd($number2, $number1 % $number2);
    }

    return $number1;
}
