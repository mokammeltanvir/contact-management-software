<?php
include "../db_connection.php";

$id = $_POST['id'];

$queryDelete = "DELETE FROM contacts WHERE id =".$id."";
$mysqli->query($queryDelete);
		
$mysqli->close();

?>