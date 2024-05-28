<?php include("section/header.php"); ?>

<div class="wrapper">
   <!-- top navbar-->
   <?php include("section/topbar.php"); ?>
   <!-- sidebar-->
   <?php include("section/users.php"); ?>
   <!-- offsidebar-->
   <!-- Main section-->
   <section class="section-container">
      <!-- Page content-->
      <div class="content-wrapper">
         <div class="content-header pb-0">
            <div class="content-title">My Friends</div>
            <?php
            if (isset($_SESSION['msg_remove'])) {
               echo '<div class="ml-auto"><button class="btn btn-labeled btn-primary float-right" type="button"><span class="btn-label"><i class="fa fa-plus-circle"></i></span>' . $_SESSION['msg_remove'] . '</button></div>';
               unset($_SESSION['msg_remove']);
            }
            ?>
         </div>
         <div class="contaner">
            <div class="row">
               <?php
               include('php/config.php');

               $select = "SELECT * FROM `friends` WHERE my_id = " . $_SESSION['userid'] . "";
               $sql = mysqli_query($connect, $select);
               $result = mysqli_num_rows($sql);
               if ($result > 0) {
                  while ($row = mysqli_fetch_assoc($sql)) {
                     $id         = $row['friend_id'];
                     $user_id         = $row['user_id'];
                     $img        = $row['user_img'];
                     $user_name  = $row['user_name'];

                     if ($_SESSION['userid'] == $id) {
                     } else {
                        echo '<div class="col-5 col-lg-3 col-md-4 col-sm-4 mb-3">
                     <div class="">
                        <div class=" d-flex justify-content-center align-items-center" style="width: 100%;">
                           <img src="img/user/' . $img . '" class="img-fluid col-md-7 rounded-circle" alt="Image">
                        </div>
                        <div class="col-md-12 p-2">
                           <div class="text-center">
                           <h4>' . $user_name . '</h4>
                           <p title="Remove Friend">
                              <a href="php/remove_friend_action.php?friendid=' . $id . '" class="btn btn-danger"><em class="fas fa-minus"></em></a>
                           </p>
                           </div>
                        </div>
                     </div>
                  </div>';
                     }
                  }
               } else {
                  echo '  <div class="text-center col-12">
                  <p class="text-center w-50">You have no Friend to display, Add New Friends below.</p>
                  </div>';
               }
               ?>

            </div>
         </div>
      </div>


      <div class="content-wrapper">
         <div class="content-header pb-0">
            <div class="content-title">Add New Friends<br><small> <?php echo $_SESSION['fullname']; ?>.</small></div>
            <?php
            if (isset($_SESSION['msg'])) {
               echo '<div class="ml-auto"><button class="btn btn-labeled btn-primary float-right" type="button"><span class="btn-label"><i class="fa fa-plus-circle"></i></span>' . $_SESSION['msg'] . '</button></div>';
               unset($_SESSION['msg']);
            }
            ?>
         </div>
         <div class="contaner">
            <div class="row">
               <?php
               include('php/config.php');

               $select = "SELECT * FROM `users` WHERE 1";
               $sql = mysqli_query($connect, $select);
               $result = mysqli_num_rows($sql);
               if ($result > 0) {
                  while ($row = mysqli_fetch_assoc($sql)) {
                     $id         = $row['id'];
                     $img        = $row['img'];
                     $user_name  = $row['fullname'];

                     if ($_SESSION['userid'] == $id) {
                     } else {
                        echo '<div class="col-5 col-lg-3 col-md-4 col-sm-4 mb-3">
                     <div class="">
                        <div class=" d-flex justify-content-center align-items-center" style="width: 100%;">
                           <img src="img/user/' . $img . '" class="img-fluid col-md-7 rounded-circle" alt="Image">
                        </div>
                        <div class="col-md-12 p-2">
                           <div class="text-center">
                           <h4>' . $user_name . '</h4>
                           <p title="Add Friend">
                              <a href="php/add_friend_action.php?friendid=' . $id . '" class="btn btn-primary"><em class="fas fa-plus"></em></a>
                           </p>
                           </div>
                        </div>
                     </div>
                  </div>';
                     }
                  }
               }
               ?>

            </div>
         </div>
      </div>


   </section>
</div><!-- =============== VENDOR SCRIPTS ===============-->

<?php include("section/footer.php") ?>


<!-- if ($user_id == $id) {
                        }else {
                           echo '<div class="col-5 col-lg-3 col-md-4 col-sm-4 mb-3">
                        <div class="">
                           <div class=" d-flex justify-content-center align-items-center" style="width: 100%;">
                              <img src="img/user/' . $img . '" class="img-fluid col-md-7 rounded-circle" alt="Image">
                           </div>
                           <div class="col-md-12 p-2">
                              <div class="text-center">
                              <h4>' . $user_name . '</h4>
                              <p title="Add Friend">
                                 <a href="php/add_friend_action.php?friendid=' . $id . '" class="btn btn-primary"><em class="fas fa-plus"></em></a>
                              </p>
                              </div>
                           </div>
                        </div>
                     </div>';
                        } -->

                        <!-- if ($_SESSION['userid'] == $id) {
                     } elseif (isset($user_id) && $user_id == $id) {
                     } else {
                        echo '<div class="col-5 col-lg-3 col-md-4 col-sm-4 mb-3">
                     <div class="">
                        <div class=" d-flex justify-content-center align-items-center" style="width: 100%;">
                           <img src="img/user/' . $img . '" class="img-fluid col-md-7 rounded-circle" alt="Image">
                        </div>
                        <div class="col-md-12 p-2">
                           <div class="text-center">
                           <h4>' . $user_name . '</h4>
                           <p title="Add Friend">
                              <a href="php/add_friend_action.php?friendid=' . $id . '" class="btn btn-primary"><em class="fas fa-plus"></em></a>
                           </p>
                           </div>
                        </div>
                     </div>
                  </div>'; -->