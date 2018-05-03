<?php

namespace Algorithms\Controllers\Sort;

use Algorithms\AlgorithmInterface;

/**
 * Class AlgorithmQuickSort
 * @package Algorithms\Controllers
 */
class AlgorithmQuickSort implements AlgorithmInterface
{
  private $numbers;
  private $steps = 0;
  private $result = false;

  /**
   * AlgorithmQuickSort constructor.
   * @param array $numbers
   */
  public function __construct(array $numbers)
  {
    $this->numbers = $numbers;
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
   * QuickSort with recursion
   * @param array $numbers
   * @return array
   */
  private function startDataProcessing(array $numbers): array
  {
    $this->steps++;
    $count = \count($numbers);

    // <= 0 elements in array
    if ($count <= 1) {
      return $numbers;
    }
    // variables
    $divider = $numbers[0]; // random num
    $left = [];
    $right = [];

    // if element is smaller than divider => left, else => right
    // $i = 1 because $numbers[0] is divider
    // < $count because array start with zero, max array $key = $count - 1
    for ($i = 1; $i < $count; $i++) {
      if ($numbers[$i] <= $divider) {
        $left[] = $numbers[$i];
      } else {
        $right[] = $numbers[$i];
      }
    }

    // recursion
    $right = $this->startDataProcessing($right);
    $left = $this->startDataProcessing($left);

    // return array with $left, $divider and $right parts
    return array_merge($left, array($divider), $right);
  }

  /**
   * Return result of algorithm
   * @return array|bool
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