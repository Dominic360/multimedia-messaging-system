<aside class="aside-container">
    <!-- START Sidebar (left)-->
    <aside class="mt-5 pt-2">
        <!-- START Off Sidebar (right)-->
        <nav>
            <!-- START user info-->
            <div class="p-3" style="background-image: url('img/offsidebar-bg.jpg')">
                <div class="text-center">
                    <p><img class="img-fluid rounded-circle img-thumbnail" src="img/user/<?php echo $_SESSION['userimg']; ?>" style="width: 64px; height: 64px" alt="Image"></p>
                    <p class="text-white"><strong><?php echo $_SESSION['fullname']; ?></strong></p>
                </div>
            </div><!-- END user info-->
            <!-- START list title-->
            <div class="px-2 py-3"><small class="text-muted">FRIENDS</small></div><!-- START User status-->

            <a href="group.php" class="text-decoration-none">
                <div class="p-2 dark-on-hover">
                    <div class="d-flex">
                        <div class="d-flex justify-content-center align-items-center"><p class="img-fluid rounded-circle bg-light text-center text-dark d-flex justify-content-center align-items-center" style="width: 40px; height: 40px; font-weight:600;"><span class="text-primary small"><em class="fas fa-arrow-up"></em></span>P</p>
                            <div class="ml-2"><strong class="text-white">LINK <span class="text-warning small"><em class="fas fa-arrow-up"></em></span>P Group</strong><br></div>
                        </div>
                        <div class="ml-auto">
                            <div class="p-1 rounded d-inline-block mr-2 bg-success"></div>
                        </div>
                    </div>
                </div>
            </a>
            <?php
            // session_start();
            include('php/config.php');

            $select = "SELECT * FROM `friends` Where my_id = " . $_SESSION['userid'] . "";
            $sql = mysqli_query($connect, $select);
            $result = mysqli_num_rows($sql);

            if ($result > 0) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    $userid     = $row['user_id'];
                    // $fullname   = $row['fullname'];
                    $img        = $row['user_img'];
                    $username   = $row['user_name'];

                    if ($_SESSION['userid'] == $userid) {
                    } else {
                        echo '
                        <a href="message.php?receiverid=' . $userid . '" class="text-decoration-none">
                            <div class="p-2 dark-on-hover">
                                <div class="d-flex">
                                    <div class="d-flex justify-content-center align-items-center"><img class="img-fluid rounded-circle" src="img/user/' . $img . '" style="width: 40px; height: 40px" alt="Image">
                                        <div class="ml-2"><strong class="text-white">' . $username . '</strong><br></div>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="p-1 rounded d-inline-block mr-2 bg-success"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        ';
                    }
                    // <small class="text-muted">'.$username.'</small>
                }
            }
            ?>
            <!-- <div class="p-2 dark-on-hover">
            <div class="d-flex">
                <div class="d-flex"><img class="img-fluid rounded-circle" src="img/user/05.jpg" style="width: 40px; height: 40px" alt="Image">
                    <div class="ml-2"><strong class="text-white">Tommy Sam</strong><br><small class="text-muted">tommy39</small></div>
                </div>
                <div class="ml-auto">
                    <div class="p-1 rounded d-inline-block mr-2 bg-success"></div>
                </div>
            </div>
        </div> -->


            <!-- END User status-->

        </nav>
    </aside>
    <!-- END Sidebar (left)-->
</aside>