<?php
		include "../db_connection.php";

		$filename="addressbook_".date('d-m-Y').".xls";
		header ("Content-Type: application/vnd.ms-excel");
		header ("Content-Disposition: inline; filename=$filename");
		
		echo "<table>";
				echo "<thead>";
				echo "<th>Last Name</th>";				
				echo "<th>First Name</th>";
				echo "<th>Phone</th>";
				echo "<th>Email</th>";
				echo "</thead>";
				echo "<tbody>";
				
			$query_string = "SELECT * FROM contacts ORDER BY lastName";
			
				$result = $mysqli->query($query_string);
				while($row = $result->fetch_assoc()){
					//echo print_r($row);
					echo "<tr>";
					echo "<td>".$row['lastName']."</td>";
					echo "<td>".$row['firstName']."</td>";					
					echo "<td>".$row['phone']."</td>";
					echo "<td>".$row['email']."</td>";
					echo "</tr>";
					}
				echo "</tbody>";
				echo "</table>";

?>