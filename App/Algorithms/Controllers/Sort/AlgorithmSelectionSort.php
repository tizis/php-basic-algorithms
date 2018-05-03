<?php

namespace Algorithms\Controllers\Sort;

use Algorithms\AlgorithmInterface;

/**
 * Class AlgorithmSelectionSort
 * @package Algorithms\Controllers
 */
class AlgorithmSelectionSort implements AlgorithmInterface
{
  private $numbers;
  private $steps = 0;
  private $result = false;

  /**
   * AlgorithmSelectionSort constructor.
   * @param array $numbers
   */
  public function __construct(array $numbers)
  {
    $this->numbers = $numbers;
  }

  /**
   * Return result of algorithm
   * @return bool|array
   */
  public function getResult()
  {
    return $this->result;
  }

  /**
   * Return count of steps
   * @return int
   */
  public function getSteps():int
  {
    return $this->steps;
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
   * SelectionSort
   * @param $numbers
   * @return array
   */
  private function startDataProcessing($numbers):array
  {
    $count = \count($numbers);
    // loop
    for ($i = 0; $i < $count - 1; $i++) {
      $this->steps++;
      // current num
      $small = $i;
      // comparison with offset
      for ($k = $i + 1; $k < $count; $k++) {
        $this->steps++;
        if ($numbers[$k] < $numbers[$small]) {
          $small = $k;
        }
      }
      // replace elements
      $temp = $numbers[$i];
      $numbers[$i] = $numbers[$small];
      $numbers[$small] = $temp;
    }
    return $numbers;
  }
}