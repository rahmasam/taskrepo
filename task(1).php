<!-- 
# Task ... 
Write a PHP program to calculate electricity bill .
Conditions:
For first 50 units – 3.50/unit
For next 100 units – 4.00/unit
For units above 150 – 6.50/unit
You can use conditional statements. -->
<!DOCTYPE html>
<html>
<head>
	<title>Program to calculate electricity bill in PHP</title>
</head>
<body>
<?php
$result_str = $result = '';
if (isset($_POST['unit-submit'])) {
    $units = $_POST['units'];
    if (!empty($units)) {
        $result = calculate_bill($units);
        $result_str = 'bill '  . $result;
    }
}
	/**
	 * To calculate electricity bill as per unit cost
	 */
    function calculate_bill($units) {
		$first_cost = 3.50;
		$second_cost = 4.00;
		$third_cost = 6.50;
		
 
		if($units <= 50) {
			$bill = $units * $first_cost;
		}
		else if($units > 50 && $units <=150) {
			$temp = 50 * $first_cost;
			$remaining_units = $units - 50;
			$bill = $temp + ($remaining_units * $second_cost);
		}
	
		else {
			$temp = (50 * $first_cost) + (100 * $second_cost) ;
			$remaining_units = $units - 150;
			$bill = $temp + ($remaining_units * $third_cost);
		}
        return number_format((float)$bill, 2, '.', '');
}
?>

<body>
	<div id="page-wrap">
		<h1>Php - Calculate Electricity Bill</h1>

		<form action="" method="post" id="quiz-form">
            	<input type="number" name="units" id="units" placeholder="Please enter no. of Units" />
            	<input type="submit" name="unit-submit" id="unit-submit" value="Submit" />
		</form>

		<div>
		    <?php echo '<br />' . $result_str; ?>
		</div>
	</div>
</body>
</html>