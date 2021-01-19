<?php
$mysqli = new mysqli('localhost', 'root', '', 'contact_demo');
		if ($mysqli->connect_error) {
    die('Connection Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
		}
?>