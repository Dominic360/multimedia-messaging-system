<?php

$host       = "localhost";
$user       = 'root';
$pass       = '';
$db_name    = 'mms';

$connect = mysqli_connect($host,$user,$pass,$db_name);

if(!$connect){
    die("Connection Failed". mysqli_connect_error());
}