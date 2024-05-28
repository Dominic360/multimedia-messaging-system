<?php 
session_start();

include('config.php');

if(isset($_POST['submit'])){
    $sms        = $_POST['sms'];
    $img        = $_POST['img'];
    $audio      = $_POST['audio'];
    $video      = $_POST['video'];
    $date       = date("j-m-Y");

    $receiverid = $_SESSION['receiverid'];

    $select = "SELECT * FROM `users` WHERE id = '$receiverid'";
    $select_sql = mysqli_query($connect, $select);
    $fetch = mysqli_fetch_assoc($select_sql);
    $receiver = $fetch['fullname'];

    echo $receiverid;
    echo $receiver;

    $sender = $_SESSION['fullname'];
    $insert = "INSERT INTO `msg`(`username`, `receiver`, `message`, `audio`, `img`, `video`, `date`) 
    VALUES ('$sender','$receiver','$sms','$audio','$img','$video','$date')";
    $insert_sql = mysqli_query($connect, $insert);

    if($insert_sql){
        header('location: ../message.php?receiverid='.$receiverid.'');
    }
}