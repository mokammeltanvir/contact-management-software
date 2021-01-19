<?php
ini_set('display_errors', 'Off');

include "../db_connection.php";

$formData = $_POST['formData'];
$formData = json_decode($formData);

$name1 = $formData[0]->name;
$value1 = $formData[0]->value;
    $value1 = utf8_decode($value1);
    $value1 = addslashes($value1);
$name2 = $formData[1]->name;
$value2 = $formData[1]->value;
    $value2 = utf8_decode($value2);
    $value2 = addslashes($value2);
$name3 = $formData[2]->name;
$value3 = $formData[2]->value;
    $value3 = utf8_decode($value3);
    $value3 = addslashes($value3);
$name4 = $formData[3]->name;
$value4 = $formData[3]->value;
    $value4 = utf8_decode($value4);
    $value4 = addslashes($value4);
$id_contact = $formData[4]->value;

    
if($id_contact){
    $queryUpdate = "UPDATE contacts SET ".$name1." = '".$value1."',".$name2." = '".$value2."',".$name3." = '".$value3."',".$name4." = '".$value4."' WHERE id = ".$id_contact."";
    $mysqli->query($queryUpdate);
} else {

    $queryInsert = "INSERT INTO contacts(".$name1.",".$name2.",".$name3.",".$name4.") VALUES ('".$value1."','".$value2."','".$value3."','".$value4."') ";
    $mysqli->query($queryInsert);
    $id_contact = $mysqli->insert_id;
}
        
    $mysqli->close();
?>