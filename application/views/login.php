<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="text-center">
                            <img src="<?= base_url('plugins/serein/images/KKU.png') ?>" alt="logo" width="90"
                                height="120">
                        </div>
                        <div>
                            <br>
                            <h3 class="text-center">ระบบแจ้งซ่อมหลอดไฟ</h3>
                        </div>
                        <form class="pt-3">
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


<script>
$("#loginButton").click(function() {
    var username = $("#InputUsername").val();
    var password = $("#InputPassword").val();
    $.ajax({
        type: 'POST',
        url: "<?= site_url('/Login/login') ?>",
        data: {
            username: username,
            password: password
        },
        dataType: "text",
        success: function(resultData) {
            userDetail = JSON.parse(resultData);
            if (userDetail.status) {
                swal(userDetail.msg, "ใส่ถูกละนะค้าบ", "success").then(value => {
                    window.location = "<?php echo site_url('user/all'); ?>"
                });
            } else {
                swal(userDetail.msg, "รหัสผ่านไม่ถูกต้อง", "error");
            }
        },
    })
});

// function signInButton() {
//     var Username = $("#InputUsername").val();
//     var Password = $("#InputPassword").val();
//     var showData = $.ajax({
//         type: 'POST',
//         url: "<?= site_url("/login/show_user_editForm") ?>",
//         data: {
//             Username: Username,
//             Password: Password
//         },
//         dataType: "text",
//         success: function(resultData) {
//             userDetail = JSON.parse(resultData);
//         }
//     })
</script>