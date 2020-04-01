<?php 
    $jsonobj = $_REQUEST["json"];
    $obj = json_decode($jsonobj);
    include "payCalc.php";
    $employeePay = new PayCalc($obj->empName,$obj->empPay, $obj->empHours,$obj->empCode);
    echo "<p>Name: " . $employeePay->get_name() . "</p><p>Pay: " . $obj->empPay . "</p><p>Hours: ". $obj->empHours ."</p><p>Weekly Pay: " .  $employeePay->get_weeklyPay() . "</p><p>Pay Code: " . $obj->empCode . "</p>";
?>

