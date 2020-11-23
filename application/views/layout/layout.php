<!doctype html>
<html lang="en">

<?php $sBaseUrl = base_url(); //'192.168.43.244/adoption/';//base_url(); ?> 
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo $sBaseUrl.'assets'; ?>/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo $sBaseUrl.'assets'; ?>/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $sBaseUrl.'assets'; ?>/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo $sBaseUrl.'assets'; ?>/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?php echo $sBaseUrl.'assets'; ?>/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="<?php echo $sBaseUrl.'assets'; ?>/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="<?php echo $sBaseUrl.'assets'; ?>/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo $sBaseUrl.'assets'; ?>/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="<?php echo $sBaseUrl.'assets'; ?>/vendor/fonts/flag-icon-css/flag-icon.min.css">

    <!-- DataTables -->
    <link href="<?php echo $sBaseUrl.'assets'; ?>/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $sBaseUrl.'assets'; ?>/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $sBaseUrl.'assets'; ?>/plugins/datatables/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $sBaseUrl.'assets'; ?>/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $sBaseUrl.'assets'; ?>/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $sBaseUrl.'assets'; ?>/plugins/datatables/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!--link href="<?php echo $sBaseUrl.'assets'; ?>/plugins/js/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $sBaseUrl.'assets'; ?>/plugins/js/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" /-->

    <title>Adopt A Child</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="/adoption">Adoption Connection</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                       <?php
                           if($this->session->userdata('user_id'))
                           {
                               $sName = ucfirst($this->session->userdata('username')).' '.$this->session->userdata('surname');
                           }

                            if($this->session->userdata('user_id') == 1)
                                echo '<li class="nav-item">
                                    <div id="custom-search" class="top-search-bar">
                                            <a class="nav-link active" href="/adoption/users/register" data-toggle="" aria-expanded="false" data-target="" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Register</a>
                                    </div>
                                </li>';
                        ?>
                        <?php if($this->session->userdata('user_id')): ?>
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                    <a class="nav-link active" href="/adoption/users/logout" data-toggle="" aria-expanded="false" data-target="" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>logout( <?php echo ucfirst($this->session->userdata('username')); ?> )</a>
                            </div>
                        </li>                        
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $sBaseUrl.'assets'; ?>/imgs/noimage.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $sName; ?></h5>
                                </div>
                                <a class="dropdown-item" href="<?php echo $sBaseUrl.'admin'; ?>/userprofile/id/<?php echo $this->session->userdata('user_id'); ?>"><i class="fas fa-user mr-2"></i>Account</a>
                                <!--a class="dropdown-item" href="<?php echo $sBaseUrl.'admin'; ?>/settings"><i class="fas fa-cog mr-2"></i>Setting</a-->
                                <a class="dropdown-item" href="<?php echo $sBaseUrl.'users'; ?>/logout"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <?php if($this->session->userdata('user_id')): ?>
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="/adoption/" data-toggle="" aria-expanded="false" data-target="" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Adoption</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $sBaseUrl.'adopt'; ?>/index">Gallery of Children</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $sBaseUrl.'adopt'; ?>/addchild">Enlist a Child</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $sBaseUrl.'adopt'; ?>/adopter">Adoption Application</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        <?php if($this->session->userdata('user_id') == 1): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-fw fa-inbox"></i>Administrator <span class="badge badge-secondary">New</span></a>
                                <div id="submenu-7" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $sBaseUrl.'admin'; ?>/children">Children</a>
                                        </li>
										<li class="nav-item">
                                            <a class="nav-link" href="<?php echo $sBaseUrl.'admin'; ?>/approve">Children to Approve</a>
                                        </li>
                                       <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-1" aria-controls="submenu-1-1">Applications</a>
                                            <div id="submenu-1-1" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo $sBaseUrl.'admin'; ?>/applications/all">All Applications</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo $sBaseUrl.'admin'; ?>/applications/new">New Applications</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo $sBaseUrl.'admin'; ?>/applications/approved">Approved Applications</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo $sBaseUrl.'admin'; ?>/applications/declined">Declined Applications</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $sBaseUrl.'admin'; ?>/biological_parents">Biological Parents</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $sBaseUrl.'admin'; ?>/foster_parents">Foster Parents</a>
                                        </li>
                                        <!--li class="nav-item">
                                            <a class="nav-link" href="<?php echo $sBaseUrl.'admin'; ?>/orphanage">Orphanages</a>
                                        </li
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $sBaseUrl.'admin'; ?>/report">Generate Reports</a>
                                        </li>-->
                                       <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-1">Generate Reports</a>
                                            <div id="submenu-1-2" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo $sBaseUrl.'admin'; ?>/report">Children's Report</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo $sBaseUrl.'admin'; ?>/foster_report">Foster Parent's Report</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo $sBaseUrl.'admin'; ?>/biological_report">Biological Parent's Report</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        <?php endif; ?>
                            <!--<li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Chart</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $sBaseUrl.'pages'; ?>/chart-c3.html">C3 Charts</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $sBaseUrl.'pages'; ?>/chart-chartist.html">Chartist Charts</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $sBaseUrl.'pages'; ?>/chart-charts.html">Chart</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $sBaseUrl.'pages'; ?>/chart-morris.html">Morris</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $sBaseUrl.'pages'; ?>/chart-sparkline.html">Sparkline</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $sBaseUrl.'pages'; ?>/chart-gauge.html">Guage</a>
                                        </li>
                                    </ul>
                                </div>
                            </li> -->

                        </ul>
                    </div>
                </nav>
            </div>
            <?php endif; ?>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
             <!-- Flash messages -->
      <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo '<div class="alert alert-success" role="alert">'.$this->session->flashdata('user_registered').'</div>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('user_loggedin')) 
            echo '<div class="alert alert-success" role="alert">'.$this->session->flashdata('user_loggedin').'</div>';
       ?>
