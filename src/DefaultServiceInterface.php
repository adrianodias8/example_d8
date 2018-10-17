<?php

namespace Drupal\example_d8;

/**
 * Interface DefaultServiceInterface.
 */
interface DefaultServiceInterface {
  /**
   * Gets a list of Odd Numbers until given number.
   *
   * @param $until
   * @return array
   */
  public function generateOddNumbers($until);
  
}
