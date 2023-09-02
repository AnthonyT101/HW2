<!DOCTYPE html>

<!-- Author: Anthony, Malachi, Sami
Date: 9/2/2023
File: Homework2
Purpose: Homework #2
-->

<html>
	<head>
		<title> PHP HW2</title>
		<link rel="stylesheet" type="text/css" href="sample.css">
	</head>
	<body style="background-color: lightgreen;">
		<center><h1>Your Array</h1></center>
	<?php
	
	//Variables
		$rowInput = (int)$_POST['rowsInput'];
		$columnInput = (int)$_POST['columnsInput'];
		$minValue = (int)$_POST['minRandomValue'];
		$maxValue = (int)$_POST['maxRandomValue'];
	//Printing variables
		print("<center><p>Your array size is: $rowInput x $columnInput.</p></center>");
		print("<center><p>Your min value is: $minValue.</p></center>");
		print("<center><p>Your max value is: $maxValue.</p></center>");
		
	//Creating the array from the user input using looping and using Random method to generate a random value from the min and max.
		$arr = array();
		for($i = 0; $i < $rowInput; $i++) {
			$row = array();
			for($j = 0; $j < $columnInput; $j++) {
				$ranVal = rand($minValue, $maxValue);
				$row[] = $ranVal;
			}
			$arr[] = $row;
		}
	
	//Creating the first table using the values from the first array.
		echo '<center><table></center>';
	//This iterates through the rows of the $arr array and makes an HTML table row for each one.
            foreach ($arr as $row) {
                echo '<tr>';
                foreach ($row as $index) {
                    echo '<td>' . $index . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
			echo '<br>';
	
	//Creating the second table using the values from the first table to find the sum, total count, average, and standard deviation.
		echo '<table>';
            echo '<thead><tr>';
            echo '<th>Row</th>';
            echo '<th>Sum</th>';
            echo '<th>Average</th>';
            echo '<th>Standard Deviation</th>';
            echo '</tr></thead>';
	//This iterates through each row in $arr and calculates the sum of the row with "array_sum", the count,
	//the average of the row and prevents division of 0 incase row is empty, and the standard deviation.
	//Had to look up a method to calculate standard deviation, I could not find it in the book.
		foreach ($arr as $rowIndex => $row) {
                $rowSum = array_sum($row);
                $rowCount = count($row);
                $rowAvg = ($rowCount > 0) ? $rowSum / $rowCount : 0;
                $rowStdDeviation = ($rowCount > 0) ? sqrt(array_sum(array_map(function ($x)use ($rowAvg) { return pow($x - $rowAvg, 2); }, $row)) / $rowCount) : 0;

                echo '<tr>';
                echo '<td>' . ($rowIndex + 1) . '</td>';
                echo '<td>' . $rowSum . '</td>';
                echo '<td>' . number_format($rowAvg, 3) . '</td>';
                echo '<td>' . number_format($rowStdDeviation, 3) . '</td>';
                echo '</tr>';
            }
            echo '</table>';
	
	//Creating the third table using the values from the first table
			echo '<br>';
            echo '<table>';
	//This does exactly the same thing as the first table.
            foreach ($arr as $row) {
                echo '<tr>';
                foreach ($row as $index) {
                    echo '<td>' . $index . '</td>';
                }
                echo '</tr>';
	//This iterates through the rows and determines if the element is greater than 0(positive), less than 0(negative),
	//or equal to 0(zero) then displays the value under the original table cell.
				echo '<tr>';
                foreach ($row as $index) {
                    echo '<td>';
                    if ($index > 0) {
                        echo 'positive';
                    } elseif ($index < 0) {
                        echo 'negative';
                    } else {
                        echo 'zero';
                    }
                    echo '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
		
	?>
	
	<br>
	<center><a href="html.html"> Return back to original page</a></center>
	</body>
</html>
