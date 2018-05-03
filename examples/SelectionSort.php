<?php

require __DIR__.'/../vendor/autoload.php';

use Algorithms\Controllers\Sort\AlgorithmSelectionSort;

/**
 * Example of selection sort
 */

$numbers = (new \Helpers\RandomGenerator())->getRangeOfNumbers([
  'min' => 1,
  'max' => 2048,
  'count' => 32
]);

$binarySearch = new AlgorithmSelectionSort($numbers);
$binarySearch->start();

// result
dump($binarySearch->getResult());
// count of steps
dump($binarySearch->getSteps());
// numbers in array
dump($numbers);