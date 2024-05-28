<?php
session_start();

if (!isset($_SESSION['userid'])) {
    header('location: index.php');
}
?>

<header class="topnavbar-wrapper">
    <!-- <header class="topnavbar-wrapper"> -->
    <!-- START Top Navbar navbar-custom-->
    <nav class="navbar topnavbar">
        <!-- <nav class="navbar topnavbar"> -->
        <!-- START navbar header-->
        <div class="navbar-header"><a class="navbar-brand text-center" href="dashboard.php">
                <div class="brand-logo text-light row justify-content-center">LINK <span class="text-warning small"><em class="fas fa-arrow-up"></em></span>P</div>
                <!-- <div class="brand-logo-collapsed"><img class="img-fluid" src="img/logo-single.png" alt="App Logo"></div> -->
            </a></div>
        <!-- END navbar header -->
        <!-- START Left navbar-->
        <ul class="navbar-nav mr-auto flex-row">
            <li class="nav-item">
                <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                <!-- <a class="nav-link d-none d-md-block d-lg-block d-xl-block" href="#" data-trigger-resize="" data-toggle-state="aside-collapsed"><em class="fas fa-align-left"></em></a> -->
                <!-- Button to show/hide the sidebar on mobile. Visible on mobile only. -->
                <a class="nav-link sidebar-toggle d-md-none" href="#" data-toggle-state="aside-toggled" data-no-persist="true"><em class="fas fa-align-left"></em></a>
            </li><!-- Search icon-->
            <!-- <li class="nav-item"><a class="nav-link" href="#" data-search-open=""><em class="fas fa-search"></em></a></li> -->
            <li class="nav-item px-3 font-weight-bold"><?php
                if(isset($receiver )){
                    echo $receiver ;
                }else{
                    echo '<strong class="text-dark">LINK <span class="text-primary small"><em class="fas fa-arrow-up"></em></span>P Group</strong>';
                }
            ?></li>
        </ul><!-- END Left navbar-->
        <!-- START Right Navbar-->
        <ul class="navbar-nav flex-row">
            <!-- START Messages menu-->
            <li class="nav-item me-5 pt-1" title="Add Friend"><a href="add_friend.php" class="nav-link d-flex justify-content-center align-item-center"><em class="fas fa-plus"></em></a></li>
            <!-- START Alert menu-->
            <!-- END Alert menu-->
            <!-- START Messages menu-->
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-toggle="dropdown"><em class="fas fa-user"></em></a><!-- START Dropdown menu-->
                <div class="dropdown-menu dropdown-menu-right animated bounceIn">
                    <div class="dropdown-item">
                        <div class="p-1">
                            <p>Overall progress</p>
                            <div class="progress progress-xs m-0">
                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"><span class="sr-only">80% Complete</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <!-- <div class="dropdown-item">Profile</div>
                    <div class="dropdown-item">Settings</div>
                    <div class="dropdown-item">Notifications<div class="badge badge-info float-right">5</div>
                    </div>
                    <div class="dropdown-item">Messages<div class="badge badge-danger float-right">10</div>
                    </div> -->
                    <div class="dropdown-item"><a href="update.php" class="text-decoration-none">Edit Profile</a></div>
                    <div class="dropdown-item"><a href="logout.php" class="text-decoration-none">Logout</a></div>
                </div><!-- END Dropdown menu-->
            </li><!-- START Offsidebar button-->
            <!-- <li class="nav-item"><a class="nav-link" href="#" data-toggle-state="offsidebar-open" data-no-persist="true"><em class="fas fa-align-right"></em></a></li>END Offsidebar menu -->
        </ul>
        <!-- END Right Navbar-->

        <!-- START Search form-->
        <!-- <form class="navbar-form" role="search" action="#">
            <div class="form-group"><input class="form-control" type="text" placeholder="Type and hit enter ...">
                <div class="fas fa-times navbar-form-close" data-search-dismiss=""></div>
            </div><button class="d-none" type="submit">Submit</button>
        </form> -->
        <!-- END Search form-->

    </nav>
    <!-- END Top Navbar-->
</header>