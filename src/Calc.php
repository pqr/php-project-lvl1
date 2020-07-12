<?php

namespace Brain\Calc;

use function cli\line;
use function cli\prompt;

const MIN_RAND_NUMBER = 0;
const MAX_RAND_NUMBER = 100;
const ROUNDS = 3;

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
    line('Welcome to the Brain Games!');
    line('What is the result of the expression?');
    $name = prompt('May I have your name?');
    line("Hello, $name!");

    for ($round = 0; $round < ROUNDS; $round++) {
        $number1 = random_int(MIN_RAND_NUMBER, MAX_RAND_NUMBER);
        $number2 = random_int(MIN_RAND_NUMBER, MAX_RAND_NUMBER);
        $operator = OPERATORS[array_rand(OPERATORS)];
        $correctAnswer = (string)calc($operator, $number1, $number2);
        line("Question: $number1 $operator $number2");
        $answer = prompt('Your answer');
        if ($answer !== $correctAnswer) {
            line("'$answer' is wrong answer ;(. Correct answer is '$correctAnswer'.");
            line("Let's try again, Sam!");
            return;
        }

        line('Correct!');
    }
}
