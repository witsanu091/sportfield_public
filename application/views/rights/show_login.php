<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
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
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="text-center">
                                <img src="<?=base_url('plugins/serein/images/KKU.png')?>" alt="logo" width="90"
                                    height="120">
                            </div>
                            <div>
                                <br>
                                <h3 class="text-center">ระบบแจ้งซ่อมหลอดไฟ</h3>
                            </div>
                            <form class="pt-3" action="<?php echo base_url(); ?>login/login" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="InputUsername"
                                        placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="InputPassword"
                                        placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <button type="button" id="loginButton"
                                        class="btn btn-block btn-warning btn-lg font-weight-medium auth-form-btn">เข้าสู่ระบบ</button>
                                </div>
                                <!-- <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            Keep me signed in
                                        </label>
                                    </div>
                                    <a href="#" class="auth-link text-black">Forgot password?</a>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Don't have an account? <a href="register.html" class="text-primary">Create</a>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?=base_url('plugins/serein/')?>vendors/js/vendor.bundle.base.js"></script>
    <script src="<?=base_url('plugins/serein/')?>vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="<?=base_url('plugins/serein/')?>js/off-canvas.js"></script>
    <script src="<?=base_url('plugins/serein/')?>js/hoverable-collapse.js"></script>
    <script src="<?=base_url('plugins/serein/')?>js/template.js"></script>
    <script src="<?=base_url('plugins/serein/')?>js/settings.js"></script>
    <script src="<?=base_url('plugins/serein/')?>js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>
<script>
$("#loginButton").click(function() {
    var username = $("#InputUsername").val();
    var password = $("#InputPassword").val();
    $.ajax({
        type: 'POST',
        url: "<?=site_url('/Login/login')?>",
        data: {
            username: username,
            password: password
        },
        dataType: "text",
        success: function(resultData) {
            userDetail = JSON.parse(resultData);
            // console.log(userDetail);
            if (userDetail.status ==
                "admin") { // userdetail = { status : "admin", msg:"login success"}
                swal(userDetail.msg, "ผู้ดูแลระบบ", "success").then(value => {
                    window.location = `<?php echo site_url(); ?>${userDetail.url}`
                });
            } else if (userDetail.status ==
                "company") { // userdetail = { status : "admin", msg:"login success"}
                swal(userDetail.msg, "งานไฟฟ้า", "success").then(value => {
                    window.location = `<?php echo site_url(); ?>${userDetail.url}`
                });
            } else {
                swal(userDetail.msg, "รหัสผ่านไม่ถูกต้อง", "error").then(value => {
                    // window.location = "<?php echo site_url('login/show_login'); ?>"
                });
                // window.location = "<?php echo site_url('login/show_login'); ?>"
            }
        },
    })
});
</script>