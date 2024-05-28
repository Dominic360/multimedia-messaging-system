<?php include('section/header.php');
session_start();
?>

<?php
include('php/config.php');

$_SESSION['msg'] = '';

$id = $_SESSION['userid'];

$select = "SELECT * FROM `users` WHERE `id`='$id'";
$select_sql = mysqli_query($connect, $select);
// $result = mysqli_num_rows($select_sql);

$row = mysqli_fetch_assoc($select_sql);
// $userid     = $row['user_id'];
$full_name  = $row['fullname'];
$my_img     = $row['img'];
$user       = $row['username'];
$pass       = $row['password'];



if (isset($_POST['submit'])) {
   // $fullname       = $_POST['fullname'];
   // $username       = $_POST['username'];
   $password       = $_POST['password'];
   $img            = $_POST['img'];
   $date           = date("Y-m-j");

   // if (empty($fullname)) {
   //    $_SESSION['msg'] = "Full Name is Required!";
   //    header('location: ../register.php');
   // } 
   // elseif (empty($username)) {
   //    $_SESSION['msg'] = "User Name is Required!";
   //    header('location: ../register.php');
   // }
   //  else
   if (empty($password)) {
      $_SESSION['msg'] = "Password is Required!";
      header('location: ../register.php');
   } elseif (empty($img)) {
      $_SESSION['msg'] = "Image is Required!";
      header('location: ../register.php');
   } else {

      // SQL query for Data Insertion...
      $update = "UPDATE `users` SET `password`='$password',`img`='$img',`date`='$date' WHERE id = '$id'";
      $sql = mysqli_query($connect, $update);

      if ($sql) {
         $_SESSION['msg'] = "Record Successfully inserted!";

         // $_SESSION['fullname'] = $fullname;
         // $_SESSION['username'] = $row['username'];
         $_SESSION['userimg'] = $img;

         header('location: dashboard.php');
      } else {
         $_SESSION['msg'] = "There is an Error on record insertion!";
         header('location: dashboard.php');
      }
   }
}

?>

<div class="wrapper">
   <div class="full-page-background bg-darker"></div>
   <div class="d-flex align-items-center justify-content-center h-100 w-100 flex-column">
      <!-- START card-->
      <div class="card card-flat" style="min-width: 300px">
         <div class="card-header text-center bg-transparent border-0"><a href="#">
               <h4>LINK <span class="text-warning small"><em class="fas fa-arrow-up"></em></span>P</h4>
            </a></div>
         <div class="card-body">
            <p class="text-center text-bold">Update Profile.</p>

            <?php
            if (isset($_SESSION['msg'])) {
               echo '<p>' . $_SESSION['msg'] . '</p>';
               unset($_SESSION['msg']);
            }
            ?>

            <form id="registerForm" method="post" novalidate>
               <!-- <div class="form-group"><label class="text-muted" for="signupInputEmail1">Full Name</label>
                  <div class="input-group with-focus">
                     <input class="form-control border-right-0" id="fullname" type="text" name="fullname" placeholder="Enter Full Name" autocomplete="off" value="<?php echo $full_name ?>" required>
                     <div class="input-group-append">
                        <span class="input-group-text text-muted bg-transparent border-left-0"><em class="fa fa-account"></em></span>
                     </div>
                  </div>
               </div> -->

               <!-- <div class="form-group"><label class="text-muted" for="signupInputRePassword1">User Name</label>
                  <div class="input-group with-focus"><input class="form-control border-right-0" id="username" type="text" name="username" placeholder="Enter User Name" value="<?php echo $user ?>" autocomplete="off" required>
                     <div class="input-group-append"><span class="input-group-text text-muted bg-transparent border-left-0"><em class="fa fa-user"></em></span></div>
                  </div>
               </div> -->



               <div class="form-group"><label class="text-muted" for="signupInputPassword1">Password</label>
                  <div class="input-group with-focus"><input class="form-control border-right-0" id="signupInputPassword1" type="text" name="password" placeholder="Password" value="<?php echo $pass ?>" autocomplete="off" required>
                     <div class="input-group-append"><span class="input-group-text text-muted bg-transparent border-left-0"><em class="fa fa-lock"></em></span></div>
                  </div>
               </div>

               <!-- <div class="">
                  <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded w-50 shadow-sm mx-auto d-block"></div>

                  <div class="input-group mb-3 px-2 py-2 rounded-pill bg-light text-dark shadow-sm">
                     <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0 text-dark" name="img">
                     <label id="upload-label" for="upload" class="font-weight-light text-dark">Choose file</label>
                     <div class="input-group-append">
                        <label for="upload" class="btn btn-dark m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-light"></i><small class="text-uppercase font-weight-bold text-light">Choose file</small></label>
                     </div>
                  </div>
               </div> -->

               <div class="form-group">
                  <label class="control-label col-lg-6">Product Image</label>
                  <div class="col-lg-8">
                     <div class="fileupload fileupload-new" data-provides="fileupload">
                        <!-- <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="assets/img/demoUpload.jpg" alt="" /></div> -->
                        <!-- <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div> -->
                        <div>
                           <span class="btn btn-file btn-primary"><span class="fileupload-new"></span><span class="fileupload-exists"></span><input type="file" name="img" /></span>
                           <!-- <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a> -->
                        </div>
                     </div>
                  </div>
               </div>


               <p>Back to dashboard <a class="ml-1" href="dashboard.php">Dashboard</a></p>
               <button class="btn btn-block btn-primary mt-3" type="submit" name="submit">Create account</button>
            </form>
         </div>
      </div>
   </div>
</div><!-- =============== VENDOR SCRIPTS ===============-->
<!-- STORAGE API-->
<script src="vendor/js-storage/js.storage.js"></script><!-- i18next-->
<script src="vendor/i18next/i18next.js"></script>
<script src="vendor/i18next-xhr-backend/i18nextXHRBackend.js"></script><!-- JQUERY-->
<script src="vendor/jquery/dist/jquery.js"></script><!-- BOOTSTRAP-->
<script src="vendor/popper.js/dist/umd/popper.js"></script>
<script src="vendor/bootstrap/dist/js/bootstrap.js"></script><!-- PARSLEY-->
<script src="vendor/parsleyjs/dist/parsley.js"></script><!-- =============== APP SCRIPTS ===============-->
<script src="js/app.js"></script>
</body>


<!-- Mirrored from geedmo.com/envato/products/47admin/app/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jul 2022 12:19:50 GMT -->

</html>