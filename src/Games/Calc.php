<?php

namespace Brain\Games\Calc;

use function Brain\Engine\runGame;

use const Brain\Constants\ROUNDS_COUNT;

const MIN_RAND_NUMBER = 0;
const MAX_RAND_NUMBER = 100;
const OPERATORS = ['+', '-', '*'];

function calc($operator, $number1, $number2)
{
    switch ($operator) {
        case '+':
            return $number1 + $number2;
        case '-':
            return $number1 - $number2;
        case '*':
            return $number1 * $number2;
        default:
            throw new \InvalidArgumentException("Unknown operator $operator");
    }
}

function runGameCalc()
{
    $introduction = 'What is the result of the expression?';
    $gameData = [];

    for ($round = 0; $round < ROUNDS_COUNT; $round++) {
        $number1 = random_int(MIN_RAND_NUMBER, MAX_RAND_NUMBER);
        $number2 = random_int(MIN_RAND_NUMBER, MAX_RAND_NUMBER);
        $operator = OPERATORS[array_rand(OPERATORS)];
        $question = "$number1 $operator $number2";
        $correctAnswer = (string)calc($operator, $number1, $number2);

        $gameData[] = [$question, $correctAnswer];
    }

    runGame($introduction, $gameData);
}
