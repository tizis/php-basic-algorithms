<?php

namespace Algorithms\Controllers\Search;

use Algorithms\AlgorithmInterface;

/**
 * Class AlgorithmBinarySearch
 * @package Algorithms\Controllers
 */
class AlgorithmBinarySearch implements AlgorithmInterface
{
  private $numbers; // sorted array
  private $number; // num
  private $steps = 0; // count of steps
  private $result = false;

  /**
   * AlgorithmBinarySearch constructor.
   * @param array $numbers
   * @param int $number
   */
  public function __construct(array $numbers, int $number)
  {
    $this->numbers = $numbers;
    $this->number = $number;
  }

  /**
   * Start algorithm
   * @return bool
   */
  public function start():bool
  {
    if (\is_array($this->numbers)) {
      $this->result = $this->startDataProcessing($this->numbers);
    }
    return $this->result !== false;
  }

  /**
   * Binary search with recursion
   * @param array $numbers
   * @return bool|int
   */
  private function startDataProcessing(array $numbers)
  {
    $this->steps++;
    $count = \count($numbers);
    // if only one element in array
    if ($count === 1) {
      if ($numbers[0] === $this->number) {
        return $this->number;
      }
      return false;
    }
    // half divider
    $divider = $numbers[$count / 2];

    // check half divider
    if ($divider === $this->number) {
      return $divider;
    }

    // numbers less than the separator
    $left = \array_slice($numbers, 0, $count / 2);
    // numbers more than the separator
    $right = \array_slice($numbers, $count / 2);

    // start recursion
    $response = [];
    if ($this->number >= $divider) {
      $response = $this->startDataProcessing($right);
    }
    if ($this->number < $divider) {
      $response = $this->startDataProcessing($left);
    }
    // return response
    return $response;
  }

  /**
   * Return result of algorithm
   * @return bool|int
   */
  public function getResult()
  {
    return $this->result;
  }

  /**
   * Return count of steps
   * @return int
   */
  public function getSteps(): int
  {
    return $this->steps;
  }
}
