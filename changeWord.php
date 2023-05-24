<?php
include "index.php";
// fetch records
$words = json_decode($_POST['json'], true);
$QbName = $_GET["shopList"];

$sql = "UPDATE `QB` SET `E1` ='" . $words["E1"] . "', `E2` ='". $words["E2"] . "', `E3` ='" . $words["E3"] . "', `E4` ='". $words["E4"] ."', `E5` ='" . $words["E5"] . "', `E6` ='" . $words["E6"] ."', `E7` ='" . $words["E7"] . "', `E8` ='" . $words["E8"] . "', `E9` ='" . $words["E9"] . "', `E10` ='" . $words["E10"] . "' WHERE `name` ='" . $QbName . "';";
$result = mysqli_query($con, $sql);

echo 1;