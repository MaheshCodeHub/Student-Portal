<!DOCTYPE html>

<?php
//echo '<pre>';
//var_dump($_SESSION);   
//echo '</pre>';
?>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Data Management System</title>

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="icon" type="image/x-icon" href="https://cdn.shopify.com/s/files/1/0267/4268/5759/files/orange-leaf-logo-1200x600.jpg?v=1662009933">

        <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/plugins/summernote/summernote-bs4.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css"> <!--confirm alert -->
    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>                    
                </ul>
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">

                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            WELCOME <strong><?php //echo $this->session->userdata['admin']['admin_name'] ?></strong>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <div class="dropdown-divider"></div>
                            <a href="<?php echo base_url() . 'index.php/login_ctr/logout'; ?>" class="dropdown-item">
                                LOGOUT
                            </a>
                        </div>
                    </li>

                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #03626c!important;">
                <!-- Brand Logo -->
                <a href="#" class="brand-link bg-white">
                    <span class="brand-text"><img src="data:image/jpeg;base64,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" class="img-fluid" alt="Logo"></span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->


                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                               with font-awesome or any other icon font library -->
                          
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>index.php/master_ctr/index" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        DASHBOARD
                                    </p>
                                </a>
                            </li>   
                          
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                       Student Information
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" onclick="return newstudent();" >
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>ADD Student Details</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>index.php/master_ctr/get_all_student_list" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Student LIST</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                       Circle Information
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" onclick="return newcircle();" >
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>ADD Circle Details</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>index.php/master_ctr/circleindex" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Circle LIST</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                       Multiple Images Adding
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" onclick="return newimages();" >
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>ADD Multiple Images</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>index.php/master_ctr/get_all_mulimages" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Multiple Images LIST</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                          
                            
                        </ul>
                    </nav>

                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
            <!-- REQUIRED SCRIPTS -->
            <!-- Modal CLIENT ADD -->
            <div class="modal fade" id="modalclient" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content"  id="modalclient1" style="width: 900px ; margin-left: -130px"></div>
                </div>
            </div>
            <!-- Modal PRODUCT ADD-->
            <div class="modal fade" id="modalproduct" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content"  id="modalproduct1" style="width: 900px ; margin-left: -130px"></div>
                </div>
            </div>
            <!-- Modal UAE DM PRODUCT ADD-->
            <div class="modal fade" id="modaluaedmproduct" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content"  id="modaluaedmproduct1" style="width: 900px ; margin-left: -130px"></div>
                </div>
            </div>
            <!-- Modal UAE ESMA PRODUCT ADD-->
            <div class="modal fade" id="modaluaeesmaproduct" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content"  id="modaluaeesmaproduct1" style="width: 900px ; margin-left: -130px"></div>
                </div>
            </div>
            <!-- Modal OMAN PRODUCT ADD-->
            <div class="modal fade" id="modalomanproduct" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content"  id="modalomanproduct1" style="width: 900px ; margin-left: -130px"></div>
                </div>
            </div>
            <script src="<?php echo base_url(); ?>public/admin/plugins/jquery/jquery.min.js"></script>
            <script>
                                            $(document).ready(function () {
                                                //alert("header");
                                            })

                                            function newstudent() {
                                                $.ajax({
                                                    url: '<?php echo base_url(); ?>index.php/Master_ctr/modal_add_student_call',
                                                    data: {},
                                                    type: 'POST',
                                                }).done(function (data) {
                                                    if (data === 'NA') {
                                                        $.alert({
                                                            title: 'Alert!',
                                                            content: 'There seems a problem, please try after sometime',
                                                        });
                                                    } else {
                                                        $('#modaluaedmproduct1').html(data);
                                                        $('#modaluaedmproduct').modal('show');
                                                    }
                                                });

                                            }
                                            
                                            function newcircle() {
                                                $.ajax({
                                                    url: '<?php echo base_url(); ?>index.php/Master_ctr/modal_add_division',
                                                    data: {},
                                                    type: 'POST',
                                                }).done(function (data) {
                                                    if (data === 'NA') {
                                                        $.alert({
                                                            title: 'Alert!',
                                                            content: 'There seems a problem, please try after sometime',
                                                        });
                                                    } else {
                                                        $('#modaluaedmproduct1').html(data);
                                                        $('#modaluaedmproduct').modal('show');
                                                    }
                                                });

                                            }
                                            
                                            
                                            function newimages() {
                                                $.ajax({
                                                    url: '<?php echo base_url(); ?>index.php/Master_ctr/modal_add_Mul_images',
                                                    data: {},
                                                    type: 'POST',
                                                }).done(function (data) {
                                                    if (data === 'NA') {
                                                        $.alert({
                                                            title: 'Alert!',
                                                            content: 'There seems a problem, please try after sometime',
                                                        });
                                                    } else {
                                                        $('#modaluaedmproduct1').html(data);
                                                        $('#modaluaedmproduct').modal('show');
                                                    }
                                                });

                                            }
                                            
                                            
            </script>
