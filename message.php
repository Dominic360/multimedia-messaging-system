<?php include("section/header.php"); ?>

<div class="wrapper">

    <?php
    session_start();
    include('php/config.php');

    $receiverid = $_GET['receiverid'];
    $_SESSION['receiverid'] = $receiverid;

    if (isset($receiverid)) {
        $select_receiver = "SELECT * FROM `users` WHERE id = '$receiverid'";
        $select_sql = mysqli_query($connect, $select_receiver);
        $fetch = mysqli_fetch_assoc($select_sql);
        $receiver = $fetch['fullname'];
    }

    ?>
    <!-- top navbar-->
    <?php include("section/topbar.php"); ?>
    <!-- sidebar-->
    <?php include("section/users.php"); ?>
    <!-- offsidebar-->
    <!-- Main section-->
    <section class="section-container">


        <!-- Page content-->
        <div class="content-wrapper">
            <!-- <div class="content-header pb-0">
            <div class="content-title">Messages<br><small>Welcome user</small></div>
            <div class="ml-auto"><button class="btn btn-labeled btn-primary float-right" type="button"><span class="btn-label"><i class="fa fa-plus-circle"></i></span>Add Item</button></div>
         </div> -->
            <!-- <div class="d-none" data-notify data-onload data-message="&lt;b&gt;New Updates Available!&lt;/b&gt; Don't forget to check them!" data-options="{&quot;status&quot;:&quot;danger&quot;, &quot;pos&quot;:&quot;top-right&quot;}"></div> -->
            <div class="container">
                <div class="body">
                    <div class="row">
                        <div class="col-lg-12" style="width:100%;">

                            <div id="scr" class="rounded border bg-dark">
                                <div class="msg-body">
                                    <!-- <div class="card-head bg-success p-3">
                              <i class="icon-comments"></i>
                              New Messages

                           </div> -->

                                    <div id="dispaly" class="panel-body px-2 shadow rounded bg-white" style="min-height: 60vh;">
                                        <div class="table-responsive">
                                            <div data-scrollable data-height="550">
                                                <table class="table table-centered table-nowrap  mb-0">
                                                    <tbody>
                                                        <tr class="">
                                                            <?php
                                                            include('php/config.php');

                                                            $sender = $_SESSION['username'];
                                                            $sender_select = "SELECT * FROM `msg` WHERE 1";
                                                            $sender_sql = mysqli_query($connect, $sender_select);
                                                            $result = mysqli_num_rows($sender_sql);

                                                            if ($result > 0) {
                                                                while ($row = mysqli_fetch_assoc($sender_sql)) {
                                                                    $id             = $row['id'];
                                                                    $username       = $row['username'];
                                                                    $receiver_name       = $row['receiver'];
                                                                    $message        = $row['message'];
                                                                    $audio          = $row['audio'];
                                                                    $img            = $row['img'];
                                                                    $video          = $row['video'];
                                                                    $date           = $row['date'];

                                                                    if ($username == $_SESSION['fullname'] && $receiver_name == $receiver) {
                                                                        
                                                                        if($message && $audio && $img && $video !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-4">
                                                                            <a href="php/delete_sms.php?deleteid='.$id.'" class="btn btn-light float-left"> <em class="fas fa-trash"></em></a>
                                                                            </div>
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-success p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <p>' . $message . '</p><br>
                                                                                            <img src="img/'.$img.'" class="w-25 py-1"><br>
                                                                                            <audio src="audio/'.$audio.'" controls class="py-1"></audio><br>
                                                                                            <video src="video/'.$video.'" class="w-25 py-1" controls></video>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                        </div>';
                                                                        }elseif($message && $audio && $img !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-4">
                                                                            <a href="php/delete_sms.php?deleteid='.$id.'" class="btn btn-light float-left"> <em class="fas fa-trash"></em></a>
                                                                            </div>
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-success p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <p>' . $message . '</p><br>
                                                                                            <img src="img/'.$img.'" class="w-25 py-1"><br>
                                                                                            <audio src="audio/'.$audio.'" controls class="py-1"></audio><br>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                        </div>';
                                                                        }elseif($message && $audio && $video !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-4">
                                                                            <a href="php/delete_sms.php?deleteid='.$id.'" class="btn btn-light float-left"> <em class="fas fa-trash"></em></a>
                                                                            </div>
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-success p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <p>' . $message . '</p><br>
                                                                                            <audio src="audio/'.$audio.'" controls class="py-1"></audio><br>
                                                                                            <video src="video/'.$video.'" class="w-25 py-1" controls></video>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                        </div>';
                                                                        }elseif($message && $img && $video !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-4">
                                                                            <a href="php/delete_sms.php?deleteid='.$id.'" class="btn btn-light float-left"> <em class="fas fa-trash"></em></a>
                                                                            </div>
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-success p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <p>' . $message . '</p><br>
                                                                                            <img src="img/'.$img.'" class="w-25 py-1"><br>
                                                                                            <video src="video/'.$video.'" class="w-25 py-1" controls></video>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                        </div>';
                                                                        }elseif($audio && $img && $video !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-4">
                                                                            <a href="php/delete_sms.php?deleteid='.$id.'" class="btn btn-light float-left"> <em class="fas fa-trash"></em></a>
                                                                            </div>
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-success p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <img src="img/'.$img.'" class="w-25 py-1"><br>
                                                                                            <audio src="audio/'.$audio.'" controls class="py-1"></audio><br>
                                                                                            <video src="video/'.$video.'" class="w-25 py-1" controls></video>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                        </div>';
                                                                        }elseif($message && $audio !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-4">
                                                                            <a href="php/delete_sms.php?deleteid='.$id.'" class="btn btn-light float-left"> <em class="fas fa-trash"></em></a>
                                                                            </div>
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-success p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <p>' . $message . '</p><br>
                                                                                            <audio src="audio/'.$audio.'" controls class="py-1"></audio>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                        </div>';
                                                                        }elseif($message && $img !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-4">
                                                                            <a href="php/delete_sms.php?deleteid='.$id.'" class="btn btn-light float-left"> <em class="fas fa-trash"></em></a>
                                                                            </div>
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-success p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <p>' . $message . '</p><br>
                                                                                            <img src="img/'.$img.'" class="w-25 py-1">
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                        </div>';
                                                                        }elseif($message && $video !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-4">
                                                                            <a href="php/delete_sms.php?deleteid='.$id.'" class="btn btn-light float-left"> <em class="fas fa-trash"></em></a>
                                                                            </div>
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-success p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <p>' . $message . '</p><br>
                                                                                            <video src="video/'.$video.'" class="w-25 py-1" controls></video>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                        </div>';
                                                                        }elseif($audio && $img !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-4">
                                                                            <a href="php/delete_sms.php?deleteid='.$id.'" class="btn btn-light float-left"> <em class="fas fa-trash"></em></a>
                                                                            </div>
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-success p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <img src="img/'.$img.'" class="w-25 py-1"><br>
                                                                                            <audio src="audio/'.$audio.'" controls class="py-1"></audio><br>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                        </div>';
                                                                        }elseif($audio && $video !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-4">
                                                                            <a href="php/delete_sms.php?deleteid='.$id.'" class="btn btn-light float-left"> <em class="fas fa-trash"></em></a>
                                                                            </div>
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-success p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <audio src="audio/'.$audio.'" controls class="py-1"></audio><br>
                                                                                            <video src="video/'.$video.'" class="w-25 py-1" controls></video>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                        </div>';
                                                                        }elseif($img && $video !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-4">
                                                                            <a href="php/delete_sms.php?deleteid='.$id.'" class="btn btn-light float-left"> <em class="fas fa-trash"></em></a>
                                                                            </div>
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-success p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <img src="img/'.$img.'" class="w-25 py-1"><br>
                                                                                            <video src="video/'.$video.'" class="w-25 py-1" controls></video>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                        </div>';
                                                                        }elseif($message !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-4">
                                                                            <a href="php/delete_sms.php?deleteid='.$id.'" class="btn btn-light float-left"> <em class="fas fa-trash"></em></a>
                                                                            </div>
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-success p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <p>' . $message . '</p><br>
                                                                                            
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                        </div>';
                                                                        }elseif($audio !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-4">
                                                                            <a href="php/delete_sms.php?deleteid='.$id.'" class="btn btn-light float-left"> <em class="fas fa-trash"></em></a>
                                                                            </div>
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-success p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <audio src="audio/'.$audio.'" controls class="py-1"></audio><br>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                        </div>';
                                                                        }elseif($img !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-4">
                                                                            <a href="php/delete_sms.php?deleteid='.$id.'" class="btn btn-light float-left"> <em class="fas fa-trash"></em></a>
                                                                            </div>
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-success p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <img src="img/'.$img.'" class="w-25 py-1"><br>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                        </div>';
                                                                        }elseif($video !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-4">
                                                                            <a href="php/delete_sms.php?deleteid='.$id.'" class="btn btn-light float-left"> <em class="fas fa-trash"></em></a>
                                                                            </div>
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-success p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <video src="video/'.$video.'" class="w-25 py-1" controls></video>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                        </div>';
                                                                        }
                                                                    } elseif ($username == $receiver && $receiver_name == $_SESSION['fullname']) {
                                                                        if($message && $audio && $img && $video !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-primary p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <p>' . $message . '</p><br>
                                                                                            <img src="img/'.$img.'" class="w-25 py-1"><br>
                                                                                            <audio src="audio/'.$audio.'" controls class="py-1"></audio><br>
                                                                                            <video src="video/'.$video.'" class="w-25 py-1" controls></video>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>';
                                                                        }elseif($message && $audio && $img !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-primary p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <p>' . $message . '</p><br>
                                                                                            <img src="img/'.$img.'" class="w-25 py-1"><br>
                                                                                            <audio src="audio/'.$audio.'" controls class="py-1"></audio><br>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>';
                                                                        }elseif($message && $audio && $video !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-primary p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <p>' . $message . '</p><br>
                                                                                            <audio src="audio/'.$audio.'" controls class="py-1"></audio><br>
                                                                                            <video src="video/'.$video.'" class="w-25 py-1" controls></video>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>';
                                                                        }elseif($message && $img && $video !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-primary p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <p>' . $message . '</p><br>
                                                                                            <img src="img/'.$img.'" class="w-25 py-1"><br>
                                                                                            <video src="video/'.$video.'" class="w-25 py-1" controls></video>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>';
                                                                        }elseif($audio && $img && $video !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-primary p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <img src="img/'.$img.'" class="w-25 py-1"><br>
                                                                                            <audio src="audio/'.$audio.'" controls class="py-1"></audio><br>
                                                                                            <video src="video/'.$video.'" class="w-25 py-1" controls></video>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>';
                                                                        }elseif($message && $audio !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-primary p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <p>' . $message . '</p><br>
                                                                                            <audio src="audio/'.$audio.'" controls class="py-1"></audio><br>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>';
                                                                        }elseif($message && $img !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-primary p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <p>' . $message . '</p><br>
                                                                                            <img src="img/'.$img.'" class="w-25 py-1"><br>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>';
                                                                        }elseif($message && $video !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-primary p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <p>' . $message . '</p><br>
                                                                                            <video src="video/'.$video.'" class="w-25 py-1" controls></video>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>';
                                                                        }elseif($audio && $img !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-primary p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <img src="img/'.$img.'" class="w-25 py-1"><br>
                                                                                            <audio src="audio/'.$audio.'" controls class="py-1"></audio><br>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>';
                                                                        }elseif($audio && $video !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-primary p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <audio src="audio/'.$audio.'" controls class="py-1"></audio><br>
                                                                                            <video src="video/'.$video.'" class="w-25 py-1" controls></video>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>';
                                                                        }elseif($img && $video !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-primary p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <img src="img/'.$img.'" class="w-25 py-1"><br>
                                                                                            <video src="video/'.$video.'" class="w-25 py-1" controls></video>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>';
                                                                        }elseif($message !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-primary p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <p>' . $message . '</p><br>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>';
                                                                        }elseif($audio !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-primary p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <audio src="audio/'.$audio.'" controls class="py-1"></audio><br>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>';
                                                                        }elseif($img!== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-primary p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <img src="img/'.$img.'" class="w-25 py-1"><br>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>';
                                                                        }elseif($video !== ""){
                                                                            echo '<div class="col-12 row align-items-center">
                                                                            <div class="col-8 col-lg-8 float-right">
                                                                                <div class=" bg-primary p-2 rounded border mt-1 mb-1 ">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-lg-10">
                                                                                            <video src="video/'.$video.'" class="w-25 py-1" controls></video>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <small class="px-3 d-flex justify-content-end">' . $date . '</small>
                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>';
                                                                        }
                                                                    } 
                                                                }
                                                            }
                                                            ?>
                                                            <!-- <div class=" bg-light p-2 rounded border mt-1 mb-1">
                                                                <div class="row align-items-center">
                                                                    <div class="col-lg-10">
                                                                        <h4>Domnic</h4>
                                                                        <p>Calum Scott feat. Darren Espanto - Heaven (Official Music Video).mp3</p>
                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        <small class="px-3 d-flex justify-content-end">2022-10-23</small>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class=" bg-light p-2 rounded border mt-1 mb-1">
                                                                <div class="row align-items-center">
                                                                    <div class="col-lg-10">
                                                                        <h4>Domnic</h4>
                                                                        <img src="img/" class="w-25">
                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        <small class="px-3 d-flex justify-content-end">2022-10-23</small>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class=" bg-light p-2 rounded border mt-1 mb-1">
                                                                <div class="row align-items-center">
                                                                    <div class="col-lg-10">
                                                                        <h4>Domnic</h4>
                                                                        <audio src="audio/" controls></audio>
                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        <small class="px-3 d-flex justify-content-end">2022-10-23</small>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class=" bg-light p-2 rounded border mt-1 mb-1">
                                                                <div class="row align-items-center">
                                                                    <div class="col-lg-10">
                                                                        <h4>Domnic</h4>
                                                                        <video src="video/" class="w-25" controls></video>
                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        <small class="px-3 d-flex justify-content-end">2022-10-23</small>

                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="panel-footer p-2">
                                        <div class="row">
                                            <form action="php/message_action.php" method="post" class="row px-2 col-12">
                                                <div class="col-12 input-group mb-3 px-3 align-items-center">
                                                    <div class="col-6">
                                                        <input type="text" name="sms" id="sms" class="ml-2 form-control input-sm" placeholder="Type your message here..." />
                                                    </div>
                                                </div>
                                                <div class="col-4" title="Image Upload">
                                                    <p class="text-light pl-2">Send Image</p>
                                                    <div class="mx-1 form-group">
                                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                            <div>
                                                                <span class="btn btn-file btn-primary"><span class="fileupload-new"></span>
                                                                    <span class="fileupload-exists"></span><input type="file" name="img" /></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-4" title="Audio Upload">
                                                    <p class="text-light pl-2">Send Audio</p>
                                                    <div class="mx-1 form-group">
                                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                            <div>
                                                                <span class="btn btn-file btn-primary"><span class="fileupload-new"></span>
                                                                    <span class="fileupload-exists"></span><input type="file" name="audio" /></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-4" title="Video Upload">
                                                    <p class="text-light pl-2">Send Video</p>
                                                    <div class="mx-1 form-group">
                                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                            <div>
                                                                <span class="btn btn-file btn-primary"><span class="fileupload-new"></span>
                                                                    <span class="fileupload-exists"></span><input type="file" name="video" /></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 mx-1 input-group-btn">
                                                    <button type="submit" name="submit" class="btn btn-success float-right" id="sentbtn">
                                                        Send
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div><!-- =============== VENDOR SCRIPTS ===============-->

<?php include("section/footer.php") ?>