<?php

$conn = mysqli_connect("localhost", "asdtests_u53r", "P_O9Jy(h~5fJ") or die(mysqli_connect_error());

//$conn = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

mysqli_select_db($conn,"asdtests_new") or die(mysqli_error());

mysqli_set_charset($conn,"utf8mb4");

// Check connection





  
error_reporting(0);

?>