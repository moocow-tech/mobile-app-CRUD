<?php
class PayCalc {
  //Properties
  const REG_TIME = 40;
  private $name;
  private $weeklyPay;

  //Constructor
  function __construct($name, $payRate, $hoursWk, $payCode) {
    $this->name = $name;
    $this->weeklyPay = $this->getPay($payRate, $hoursWk, $payCode);
  }

  //Methods
  function get_name() {
    return $this->name;
  }
  
  function get_weeklyPay() {
    return $this->weeklyPay;
  }

  private function getPay($payRate, $hoursWk, $payCode)  {
    $weekly = 0;
    if ($payCode == 'H') {
      if ($hoursWk > self::REG_TIME) {
        $weekly = (($hoursWk - self::REG_TIME) * ($payRate * 1.5)) + ($payRate * self::REG_TIME);
        return $weekly;
      } else {
        $weekly = $hoursWk * $payRate; 
	return $weekly;
      }	
    } else {
       $weekly = $payRate / 52;
       return $weekly;
    }
  }
}
?>