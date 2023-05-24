<?php

// db settings
$hostname = 'localhost';
$username = 'jacky';
$password = 'dCwV6FDrRWbnNUqH';
$database = 'LA';

// db connection
$con = mysqli_connect($hostname, $username, $password, $database) or die("Error " . mysqli_error($con));