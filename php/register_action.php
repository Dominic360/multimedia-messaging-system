<?php
include('config.php');

session_start();
$_SESSION['msg'] = '';

if(isset($_POST['submit'])){
    $fullname       = $_POST['fullname'];
    $username       = $_POST['username'];
    $password       = $_POST['password'];
    $img            = $_POST['img'];
    $date           = date("Y-m-j");

    if(empty($fullname)){
        $_SESSION['msg'] = "Full Name is Required!";
        header('location: ../register.php');
    }elseif(empty($username)){
        $_SESSION['msg'] = "User Name is Required!";
        header('location: ../register.php');
    }elseif(empty($password)){
        $_SESSION['msg'] = "Password is Required!";
        header('location: ../register.php');
    }elseif(empty($img)){
        $_SESSION['msg'] = "Image is Required!";
        header('location: ../register.php');
    }else{
        // SQL query for Data Insertion...
        $insert = "INSERT INTO `users`(`fullname`, `username`, `password`, `img`, `date`) 
        VALUES ('$fullname','$username','$password','$img','$date')";
        $sql = mysqli_query($connect, $insert);

        if($sql){
            $_SESSION['msg'] = "Record Successfully inserted!";
            header('location: ../register.php');
        }else{
            $_SESSION['msg'] = "There is an Error on record insertion!";
            header('location: ../register.php');
        }
    }
}
