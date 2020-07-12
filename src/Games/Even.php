<?php

namespace Brain\Games\Even;

use function Brain\Engine\runGame;

use const Brain\Constants\ROUNDS_COUNT;

const MIN_RAND_NUMBER = 1;
const MAX_RAND_NUMBER = 100;

function runGameEven()
{
    $introduction = 'Answer "yes" if the number is even, otherwise answer "no".';

    $gameData = [];
    for ($round = 0; $round < ROUNDS_COUNT; $round++) {
        $number = random_int(MIN_RAND_NUMBER, MAX_RAND_NUMBER);
        $question = (string)$number;
        $correctAnswer = $number % 2 === 0 ? 'yes' : 'no';
        $gameData[] = [$question, $correctAnswer];
    }

    runGame($introduction, $gameData);
}
