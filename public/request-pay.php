	 <?php
			include "payCalc.php";
			$friendPay = new PayCalc('John Williams', 15.25, 42, 'H');
			echo "<p>Name: " . $friendPay->get_name() . "</p><p>Pay Rate: 15.25</p><p>Hours: 42</p><p>Weekly Pay: " .  $friendPay->get_weeklyPay() . "</p><p>Pay Code: H</p>";  
	 ?>