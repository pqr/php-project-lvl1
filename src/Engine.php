<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

function runGame($introduction, $gameData)
{
    line('Welcome to the Brain Games!');
    line($introduction);

    $name = prompt('May I have your name?');
    line("Hello, $name!");

    foreach ($gameData as [$question, $correctAnswer]) {
        line("Question: $question");
        $userAnswer = prompt('Your answer');

        if ($userAnswer !== $correctAnswer) {
            line("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
            return;
        }

        line('Correct!');
    }

    line("Congratulations, $name!");
}
