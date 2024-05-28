<?php

session_start();
include('config.php');

$friendid = $_GET['friendid'];

if (isset($friendid)) {
    $user = "SELECT * FROM `users` WHERE id = '$friendid'";
    $user_sql = mysqli_query($connect, $user);
    $user_row = mysqli_fetch_assoc($user_sql);

    $id         = $user_row['id'];
    $user_name    = $user_row['fullname'];
    $user_img     = $user_row['img'];
    $date       = date('j-m-Y');

    $my_id = $_SESSION['userid'];

    $friend = "SELECT * FROM `friends` WHERE user_id = '$friendid' && my_id = '$my_id'";
    $friend_sql = mysqli_query($connect, $friend);
    $friend_result = mysqli_num_rows($friend_sql);
    if ($friend_result > 0) {
        $_SESSION['msg'] = "You already have this user as friend.";
        header('location: ../add_friend.php');
    } else {
        $insert = "INSERT INTO `friends`(`user_id`, `user_img`, `user_name`, `my_id`, `date`) 
        VALUES ('$id','$user_img','$user_name','$my_id','$date')";
        $sql  = mysqli_query($connect, $insert);

        if ($sql) {
            $_SESSION['msg'] = "You have added a new friend.";

            header('location: ../add_friend.php');
        }
    }
};
