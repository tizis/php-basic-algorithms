<?php

namespace Helpers;

/**
 * Class RandomGenerator
 * @package Helpers
 */
class RandomGenerator
{

  /**
   * @param $settings[min, max, count, sort]
   * @return array
   */
  public function getRangeOfNumbers(array $settings = null): array
  {
    // variables
    $min = $settings['min'] ?? 0;
    $max = $settings['max'] ?? 100 * 100 * 100;
    $count = $settings['count'] ?? 10;
    $sort = $settings['sort'] ?? null;
    // generate
    $response = [];
    for ($i = 0; $i < $count; $i++) {
      $response[] = random_int($min, $max);
    }
    // sorting
    if ($sort !== null) {
      if ($sort === 'asc') {
        sort($response);
      }
      if ($sort === 'desc') {
        rsort($response);
      }
    }
    return $response;
  }
 }