<?php include("section/header.php"); ?>

<div class="wrapper">
   <!-- top navbar-->
   <?php include("section/topbar.php"); ?>
   <!-- sidebar-->
   <?php include("section/users.php"); ?>
   <!-- offsidebar-->
   <!-- Main section-->
   <section class="section-container" style="background: url('img/landing/callout.jpg') no-repeat center/cover;">
      <!-- Page content-->
      <div class="content-wrapper">
         <!-- <div class="content-header pb-0">
            <div class="content-title">Messages<br><small>Welcome .</small></div>
            <div class="ml-auto"><button class="btn btn-labeled btn-primary float-right" type="button"><span class="btn-label"><i class="fa fa-plus-circle"></i></span>Add Item</button></div>
         </div> -->
         <!-- <div class="d-none" data-notify data-onload data-message="&lt;b&gt;New Updates Available!&lt;/b&gt; Don't forget to check them!" data-options="{&quot;status&quot;:&quot;danger&quot;, &quot;pos&quot;:&quot;top-right&quot;}"></div> -->
         <div class="contaner">
            <div class="d-flex justify-content-center align-items-center" style="width: 100%; height: 70vh; background: url('img/bg1.jpg') no-repeat cover/center;">
               <div class="msg text-center">
                  <div class="content-title">
                     <img src="img/landing/undraw_meeting_re_i53h.svg" class="w-50 mb-3" alt="">
                     <p class="fw-bold"><?php echo $_SESSION['fullname']; ?> Welcome To</p>
                     <h1 class="fw-bold fs-2">Great Universe</h1>
                     <p class="fw-bold">...</p>
                  </div>
               </div>
            </div>
         </div>
   </section>
</div><!-- =============== VENDOR SCRIPTS ===============-->

<?php include("section/footer.php") ?>