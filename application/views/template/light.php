<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$title?></title>
    <!-- plugins:css -->
    <link rel="stylesheet"
        href="<?=base_url('plugins/serein/')?>vendors/iconfonts/mdi/font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?=base_url('plugins/serein/')?>vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?=base_url('plugins/serein/')?>vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?=base_url('plugins/serein/')?>css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?=base_url('plugins/serein/')?>images/favicon.png" />

    <!-- plugins:js -->
    <script src="<?=base_url('plugins/serein/')?>vendors/js/vendor.bundle.base.js"></script>
    <script src="<?=base_url('plugins/serein/')?>vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->

    <!-- custom -->
    <script src="<?=base_url('plugins/custom/')?>customScript.js"></script>
    <link rel="stylesheet" href="<?=base_url('plugins/custom/')?>customStyle.css">
    <!-- endcustom -->

</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="<?=base_url('/welcome')?>"><img
                        src="<?=base_url('plugins/serein/')?>images/stadium_repair_service2.svg" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="<?=base_url('/customer')?>"><img
                        src="<?=base_url('plugins/serein/')?>images/kku_logo.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <h3><?php //print_r($this->session->all_userdata());
echo isset($this->session->username) ? $this->session->username : "" ?></h3>
                    <!-- <h3><?php /*if (isset($this->session->name)) {
echo $this->session->name;
} else {
echo "";
}*/
?></h3> -->
                    <!-- <li class="nav-item nav-settings dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <i class="mdi mdi-apps"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class="mdi mdi-settings text-primary"></i>
                                Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo base_url(); ?>Login/logout">
                                <i class="mdi mdi-logout text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li> -->
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">


                    <?php if (isset($this->session->status) && $this->session->status == "ผู้ดูแลระบบ") {?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('Stadium/show_stadium')?>">
                            <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
                            <span class="menu-title">ข้อมูลสนาม</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('user/all')?>">
                            <i class="mdi mdi-account menu-icon"></i>
                            <span class="menu-title">จัดการผู้ใช้</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('report/list')?>">
                            <i class="mdi mdi-bell-ring-outline menu-icon"></i>
                            <span class="menu-title">รายการแจ้งข้อมูล</span>
                        </a>
                    </li>

                    <li class="nav-item">

                        <a class="nav-link" data-toggle="collapse" href="#history-elements" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="mdi mdi-finance menu-icon"></i>
                            <span class="menu-title">การแจ้งซ่อม</span>
                            <i class="menu-arrow"></i>
                        </a>


                        <div class="collapse" id="history-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link"
                                        href="<?=site_url('notify/history_notifies')?>">
                                        รายการแจ้งซ่อมทั้งหมด</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="<?=site_url('notify/record_sportfield')?>">
                                        ประวัติการซ่อมแต่ละสนาม</a></li>

                            </ul>
                        </div>


                    </li>
                    <?php }?>
                    <?php if (isset($this->session->status) && $this->session->status == "งานไฟฟ้า") {?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('notify/history_worker')?>">
                            <i class="mdi mdi-finance menu-icon"></i>
                            <span class="menu-title">รายการส่งซ่อม</span>
                        </a>
                    </li>
                    <?php }?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('report/stadium')?>">
                            <i class="mdi mdi-bell-ring-outline menu-icon"></i>
                            <span class="menu-title">หน้าการแจ้งข้อมูล</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('stadium/qrcode')?>">
                            <i class="mdi mdi-qrcode menu-icon"></i>
                            <span class="menu-title">QR CODE</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('Login/logout')?>">
                            <i class="mdi mdi-logout menu-icon"></i>
                            <span class="menu-title">ออกจากระบบ</span>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <?=$contents?>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->

                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="<?=base_url('plugins/serein/')?>js/off-canvas.js"></script>
    <script src="<?=base_url('plugins/serein/')?>js/hoverable-collapse.js"></script>
    <script src="<?=base_url('plugins/serein/')?>js/template.js"></script>
    <script src="<?=base_url('plugins/serein/')?>js/settings.js"></script>
    <script src="<?=base_url('plugins/serein/')?>js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="<?=base_url('plugins/serein/')?>js/data-table.js"></script>


    <!-- End custom js for this page-->
</body>

</html>