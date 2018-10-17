<?php

namespace Drupal\example_d8;

/**
 * Class DefaultService.
 */
class DefaultService implements DefaultServiceInterface {

  protected $myNumbers = [];
  
  public function generateOddNumbers($until){
    for ($i=1; $i<=$until; $i++){
      if( $i%2!=0){
        $this->myNumbers[] =  $i;
      }
    }
    
    return $this->myNumbers;
  }

}
