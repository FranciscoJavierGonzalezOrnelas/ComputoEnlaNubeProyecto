<?php

$db_username        = 'admin';
$db_password        = 'adminroot';
$db_name            = 'computo';
$db_host            = 'dbcomputonube.cgeiwuzdjjtq.us-east-2.rds.amazonaws.com';

$mysqli_conn = new mysqli($db_host, $db_username, $db_password,$db_name); //connect to MySql
if ($mysqli_conn->connect_error) {//Output any connection error
    die('Error : ('. $mysqli_conn->connect_errno .') '. $mysqli_conn->connect_error);
}

