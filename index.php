<?php include("section/header.php"); ?>


<?php
session_start();
include ('php/config.php');

if(isset($_SESSION['userid'])){
   header('location: dashboard.php');
}

if(isset($_POST['submit'])){
   $username      = $_POST['username'];
   $password      = $_POST['password'];

   if(empty($username)){
      $_SESSION['msg'] = 'User name is required!';
   }elseif(empty($password)){
      $_SESSION['msg'] = 'password is requird!';
   }else{
      // SQL query for login comfirmation...
      $select = "SELECT * FROM `users` Where `username`='$username' && `password`='$password'";
      $sql = mysqli_query($connect, $select);
      $result = mysqli_num_rows($sql);

      if($result > 0){
         $row = mysqli_fetch_assoc($sql);

         // Veriable Declaration...
         $_SESSION['userid'] = '';
         $_SESSION['fullname'] = '';
         $_SESSION['username'] = '';
         $_SESSION['userimg'] = '';

         // Variable Assignment...
         $_SESSION['userid'] = $row['id'];
         $_SESSION['fullname'] = $row['fullname'];
         $_SESSION['username'] = $row['username'];
         $_SESSION['userimg'] = $row['img'];

         // Location
         header('location: dashboard.php');

      }else{
         $_SESSION['msg'] = "User Don't Exit";
      }
   }
}
?>


   <div class="wrapper">
      <div class="full-page-background bg-darker"></div>
      <div class="d-flex align-items-center justify-content-center h-100 w-100 flex-column">
         <!-- START card-->
         <div class="card card-flat" style="min-width: 300px">
            <div class="card-header text-center bg-transparent border-0"><a href="#"><h4 class="">LINK <span class="text-warning small"><em class="fas fa-arrow-up"></em></span>P</h4></a></div>
            <div class="card-body">
               <p class="text-center text-bold">SIGN IN TO CONTINUE.</p>
               <!-- <p class="pt-3 text-right"><a class="text-muted" href="register.php">Need to Signup?</a></p> -->

               <?php
               if(isset($_SESSION['msg'])){
                  echo '<p>'.$_SESSION['msg'].'</p>';
                  unset($_SESSION['msg']);
               }
               ?>

               <form id="loginForm" method="post" novalidate>
                  <div class="form-group">
                     <div class="input-group with-focus"><input class="form-control border-right-0" id="username" name="username" type="text" placeholder="Enter User Name" autocomplete="off" required>
                        <div class="input-group-append"><span class="input-group-text text-muted bg-transparent border-left-0"><em class="fa fa-user"></em></span></div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="input-group with-focus"><input class="form-control border-right-0" id="exampleInputPassword1" type="password" name="password" placeholder="Password" required>
                        <div class="input-group-append"><span class="input-group-text text-muted bg-transparent border-left-0"><em class="fa fa-lock"></em></span></div>
                     </div>
                  </div>
                  <!-- <div class="clearfix">
                     <div class="custom-control custom-checkbox float-left mt-0">
                        <input class="custom-control-input" id="rememberme" type="checkbox" name="remember">
                        <label class="custom-control-label" for="rememberme">Remember Me</label>
                     </div>
                     <div class="float-right"><a class="text-muted" href="recover.html">Forgot your password?</a></div>
                  </div> -->
                  <button class="btn btn-block btn-primary mt-3" type="submit" name="submit">Login</button>
               </form>
            </div>
         </div>
      </div>
   </div><!-- =============== VENDOR SCRIPTS ===============-->
  
   <?php include("section/footer.php") ?>