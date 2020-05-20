<?php

require_once 'Matrix.php';

$matrix = new Matrix(2, 2);
echo "\nИсходная матрица:" . PHP_EOL;
var_dump($matrix->toArray());


echo "\nМатрица плюс число: " . PHP_EOL;
$matrix->add(10);
var_dump($matrix->toArray());

echo "\nМатрица минус число: " . PHP_EOL;
$matrix->diff(20);
var_dump($matrix->toArray());

echo "\nМатрица умножить на число: " . PHP_EOL;
$matrix->mult(2);
var_dump($matrix->toArray());