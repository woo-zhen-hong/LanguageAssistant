<?php
session_start();
include "index.php";
$account = $_SESSION['account'];
$QbName = $_GET["testList"];

header('Content-Type: application/json; charset=UTF-8');
// fetch records
$sql = "SELECT `E1`,`E2`,`E3`,`E4`,`E5`,`E6`,`E7`,`E8`,`E9`,`E10`
FROM `QB` 
LEFT JOIN `quiz` ON `quiz`.`name`=`QB`.`name` 
WHERE  `quiz`.`account` = '" .$_SESSION['account'] . "' AND `QB`.`name` = '" .$QbName . "'";

$result = mysqli_query($con, $sql);


// while ($row = mysqli_fetch_assoc($result)) {
//     $array = $row;
//  }

$row = mysqli_fetch_assoc($result);

// $dataset = array(
//     "data" => $array
// );
echo json_encode($row);
//echo json_encode($dataset);