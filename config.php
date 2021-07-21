<?php

//if upload online
  $user = 'u879248151_host';
  $pass = 'F0n>Z|I@QWmT';
  $host = 'localhost';
  $db = 'u879248151_db_user';

//if localhost
//$user = 'root';
//$pass = '';
//$host = 'localhost';
//$db = 'db_user';


$conn = mysqli_connect($host, $user, $pass, $db);

if(mysqli_connect_errno()){
    echo "Error occured while establishing connection into the database." . mysqli_connect_error(); }

$res = mysqli_query($conn, 'select * from accounts');
$ress = mysqli_query($conn, 'select * from logs');
$forget = mysqli_query($conn, 'select * from token');
$contact = mysqli_query($conn, 'select * from contacts');





?>

