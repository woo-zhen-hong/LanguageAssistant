<?php
session_start();
include "index.php";
$account = $_SESSION['account'];
$QbName = $_POST["testList"];
$Score = $_POST["score"];

echo $Score;

$sql = "INSERT INTO `grade` (`id`, `testname`,`account`,`score`) VALUES (NULL, '" . $QbName . "','" . $account . "','" . $Score . "');";
$result = mysqli_query($con, $sql);