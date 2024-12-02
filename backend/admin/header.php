<?php session_start(); ?>
<?php include('../../class_conn.php'); ?>
<?php $cls_conn = new class_conn; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="icon" type="image/x-icon" href="../image/Logo.png">

    <!-- Bootstrap -->
    <link href="../template/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../template/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- NProgress -->
    <link href="../template/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../template/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../template/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../template/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="../template/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../template/build/css/custom.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/ec837941fe.js" crossorigin="anonymous"></script>
</head>
<style>
    .profile_pic {
        width: 200px;
        /* เปลี่ยนขนาดตามต้องการ */
        height: 200px;
        margin-left: 5px;
        overflow: visible;
        /* แสดงรูปเต็มรูป */
    }

    .profile_img {
        width: auto;
        height: auto;
        object-fit: cover;
        /* ปรับขนาดรูปให้พอดีกรอบ */
    }

    .profile_info {
        margin-top: -45px;
        /* ขยับข้อความขึ้นด้านบน */
        text-align: center;
    }
</style>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;"> <a href="index.php" class="site_title"><i class="fa fa-laptop"></i> <span>Admin</span></a> </div>
                    <div class="clearfix"></div>
                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic"> <img src="../../images/4.png" class="img-circle profile_img"> </div>
                        <!-- เปลี่ยน โลโก้ แก้ไข picture.jpg -->
                        <!-- แก้ไขภาพ เอาคำสั่งนี้ออก alt="..." class="img-circle profile_img" -->
                        <div class="profile_info" style="margin-left: 30px; "> <span>Welcome</span>
                            <h2>ADMIN</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->
                    <br />
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>เมนู</h3>
                            <ul class="nav side-menu">
                                

                                <li><a><i class="fa fa-user"></i>ผู้ดูแลระบบ<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_admin.php"><i class="fa fa-plus-square"></i>เพิ่มข้อมูลผู้ดูแล</a></li>
                                        <li><a href="show_admin.php"><i class="fa fa-list"></i>แสดงข้อมูลผู้ดูแล</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-user-tie"></i>พนักงาน<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_employee.php"><i class="fa fa-plus-square"></i>เพิ่มข้อมูลพนักงาน</a></li>
                                        <li><a href="show_employee.php"><i class="fa fa-list"></i>แสดงข้อมูล</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-users"></i>ข้อมูลสมาชิก<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_member.php"><i class="fa fa-plus-square"></i>เพิ่มข้อมูลสมาชิก</a></li>
                                        <li><a href="show_member.php"><i class="fa fa-list"></i>แสดงข้อมูลสมาชิก</a></li>

                                    </ul>
                                </li>
                                     <li><a><i class="fa fa-file-text"></i>รายการอาหาร<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_device.php"><i class="fa fa-plus-square"></i>เพิ่มข้อมูลเครื่อง</a></li>
                                        <li><a href="show_device.php"><i class="fa fa-list"></i>แสดงข้อมูลเครื่อง</a></li>

                                    </ul>
                           </li>

                                <li><a><i class="fa fa-calendar-alt"></i>รายงาน<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="log_chart.php"><i class="fa fa-plus-square"></i>แสดงข้อมูลสุขภาพ</a></li>
                                        <li><a href="show_log.php"><i class="fa fa-list"></i>แสดงข้อมุลแบบตาราง</a></li>

                                    </ul>
                                </li>

                                <li><a><i class="fa fa-cog"></i>การตั้งค่า<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_setting.php"><i class="fa fa-plus-square"></i>เพิ่มข้อมูลการตั้งค่า</a></li>
                                        <li><a href="show_setting.php"><i class="fa fa-list"></i>แสดงข้อมูลการตั้งค่า</a></li>

                                    </ul>
                                </li>


                                <li><a href="logout.php"><i class="fa fa-sign-out"></i>ออกจากระบบ</a></li>








                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->
                    <!-- /menu footer buttons -->
                    <!-- /menu footer buttons -->
                </div>
            </div>
            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle"> <a id="menu_toggle"><i class="fa fa-bars"></i></a> </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <img src="../template/production/images/user.jpg" alt="">Admin <span class=" fa fa-angle-down"></span> </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="../admin/show_admin.php">แก้ไขข้อมูลผู้ดูแลระบบ</a></li>
                                    <li><a href="../admin/show_product.php"></i>แก้ไขข้อมูลสินค้า</a></li>


                                    <!-- <li><a href="../admin/show_product.php"><i class="fa fa-sign-out pull-right"></i>แก้ไขข้อมูลสินค้า</a></li> -->
                                    <!-- http://localhost/bagshop01/backend/admin/show_product.php -->

                                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i>ออกจากระบบ</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
            <!-- page content -->