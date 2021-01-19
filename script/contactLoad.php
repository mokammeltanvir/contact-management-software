<?php

error_reporting(0);	

include "../db_connection.php";
		
$textToFind = $_POST['textToFind'];

if(strlen($textToFind) > 0){
    $condition = "WHERE CONCAT(firstName,' ',lastName) LIKE '%".$textToFind."%'";
} else {
    $condition = "";
}
		
		
$query_string = "SELECT * FROM contacts ".$condition." ORDER BY timestamp DESC";

echo "<div class='row'>";
echo "<div class='col'>";
echo "<div class='table-responsive'>";
  echo "<table class='table table-striped'>";				
        echo "<thead class='thead-light'>";			
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Phone</th>";
        echo "<th>Email</th>";
        echo "<th>Date</th>";
        echo "<th></th>";
        echo "</thead>";

$result = $mysqli->query($query_string);
while($row = $result->fetch_assoc()){
    echo "<tr>";				            
        echo "<td>".utf8_encode($row['firstName'])."</td>";
        echo "<td>".utf8_encode($row['lastName'])."</td>";
        echo "<td>".$row['phone']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".date('Y/m/d',strtotime($row['timestamp']))."</td>";
        echo "<td>";       
        echo " <button class='btn btn-warning' onclick='singleItem(".$row['id'].")' title='Edit'><i class='fas fa-edit'></i></button>";
        echo " <button class='btn btn-primary' onclick='vCard(".$row['id'].")' title='Vcard'><i class='fas fa-id-card'></i></button>";
        echo " <button title='Delete Item' class='btn btn-danger' onclick='deleteItem(".$row['id'].")'><i class='fas fa-trash-alt'></i></button>";
        echo "</td>";
    echo "</tr>";
}
echo "</table>";
echo "</div>";
echo "</div>";
echo "</div>";

$mysqli->close();		

?>