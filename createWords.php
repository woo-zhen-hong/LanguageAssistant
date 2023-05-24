<?php
session_start();
include "index.php";
$account = $_SESSION['account'];
// fetch records
$words = json_decode($_POST['json'], true);
$QbName = $_GET["boxname"];

$sql = "INSERT INTO `QB` (`name`,`E1`,`E2`,`E3`,`E4`,`E5`,`E6`,`E7`,`E8`,`E9`,`E10`) VALUES ('" . $QbName . "','" . $words["E1"] . "','" . $words["E2"] . "','" . $words["E3"] . "','" . $words["E4"] . "','" . $words["E5"] . "','" . $words["E6"] . "','" . $words["E7"] . "','" . $words["E8"] . "','" . $words["E9"] . "','" . $words["E10"] . "');";
$result = mysqli_query($con, $sql);

$sql2 = "INSERT INTO `quiz` (`name`,`account`) VALUES ('" . $QbName . "','" . $account . "');";
$result = mysqli_query($con, $sql2);

echo 1;