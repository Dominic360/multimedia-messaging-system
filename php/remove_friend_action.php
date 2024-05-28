<?php
session_start();

include('config.php');

$friendid  = $_GET['friendid'];

if($friendid){
    $delete = "DELETE FROM `friends` WHERE friend_id = '$friendid'";
    $sql = mysqli_query($connect, $delete);

    if($sql){
        $_SESSION['msg_remove'] = "Friend deleted.";

        header("location: ../add_friend.php");
    }
}