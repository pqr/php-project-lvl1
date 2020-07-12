<?php

namespace Brain\Games\Prime;

use function Brain\Engine\runGame;

use const Brain\Constants\ROUNDS_COUNT;

const MIN_RAND_NUMBER = 2;
const MAX_RAND_NUMBER = 100;

const INTRODUCTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function runGamePrime()
{
    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $number = random_int(MIN_RAND_NUMBER, MAX_RAND_NUMBER);

        $question = (string)$number;
        $correctAnswer = isPrime($number) ? 'yes' : 'no';

        $gameData[] = [$question, $correctAnswer];
    }

    runGame(INTRODUCTION, $gameData);
}

function isPrime($number)
{
    if ($number < 2) {
        return false;
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }

    return true;
}
