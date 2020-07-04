<?php

namespace Brain\Even;

use function cli\line;
use function cli\prompt;

const ROUNDS = 3;
const MIN_RAND_NUMBER = 1;
const MAX_RAND_NUMBER = 100;

function runGameEven()
{
    line('Welcome to the Brain Games!');
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $name = prompt('May I have your name?');
    line("Hello, $name!");

    for ($round = 0; $round < ROUNDS; $round++) {
        $number = random_int(MIN_RAND_NUMBER, MAX_RAND_NUMBER);
        line("Question: $number");
        $answer = prompt('Your answer');
        $correctAnswer = $number % 2 === 0 ? 'yes' : 'no';
        if ($answer === $correctAnswer) {
            line('Correct!');
        } else {
            line("Wrong! Correct answer is '$correctAnswer'");
        }
    }
}
