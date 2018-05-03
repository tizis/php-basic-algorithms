<?php

require __DIR__.'/../vendor/autoload.php';

use Algorithms\Controllers\Search\AlgorithmBinarySearch;

/**
 * Example of binary search
 */

$numbers = (new \Helpers\RandomGenerator())->getRangeOfNumbers([
  'min' => 1,
  'max' => 64,
  'sort' => 'asc',
  'count' => 32
]);

$binarySearch = new AlgorithmBinarySearch($numbers, 64);
$binarySearch->start();

// result
dump($binarySearch->getResult());
// count of steps
dump($binarySearch->getSteps());
// numbers in array
dump($numbers);

