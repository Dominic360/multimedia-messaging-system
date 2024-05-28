<?php
session_start();

include('config.php');

$deleteid = $_GET['deleteid'];

if(isset($deleteid)){
    $delete = "DELETE FROM `msg` WHERE id = '$deleteid'";
    $sql = mysqli_query($connect, $delete);

    $receiverid = $_SESSION['receiverid'];
    if($sql){
        header('location: ../message.php?receiverid='.$receiverid.'');
    }
}