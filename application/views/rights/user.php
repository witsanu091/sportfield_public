<style>
.btn_td {
    margin: 5px
}
</style>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-10">
                <h4 class="card-title">ผู้ใช้ระบบทั้งหมด</h4>
            </div>
            <div class="col-lg-2">
                <div class="text-center">
                    <button type="button" class="btn btn-primary btn-rounded btn-icon-text btn-sm" onclick="new_user()">
                        <i class="mdi mdi-plus " ;></i>
                        เพิ่มผู้ใช้
                    </button>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table id="user_table" class="table">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อผู้ใช้</th>
                                <th>สถานะ</th>
                                <th></th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">เพิ่มผู้ใช้</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="cmxform" id="user_form" method="post">
                    <fieldset>
                        <div class="form-group">
                            <label for="username">ชื่อผู้ใช้</label>
                            <input id="username" name="username" class="form-control"
                                title="ใส่ตัวอักษรภาษาอังกฤษและตัวเลข" type="text">
                        </div>
                        <div class="form-group">
                            <label for="password">รหัสผ่าน</label>
                            <input id="password" name="password" class="form-control"
                                title="ใส่ตัวอักษรภาษาอังกฤษและตัวเลข" type="password">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">ยืนยันรหัสผ่าน</label>
                            <input id="confirm_password" name="confirm_password" class="form-control" type="password">
                        </div>
                        <div class="form-group">
                            <label for="status">สถานะ</label>
                            <div>
                                <select id="status" name="status" class="form-control">
                                    <option value="">โปรดเลือกสถานะ</option>
                                    <option value="ผู้ดูแลระบบ">ผู้ดูแลระบบ</option>
                                    <option value="งานไฟฟ้า">งานไฟฟ้า</option>
                                </select>
                            </div>
                        </div>

                        <input id="submit_type" name="submit_type" hidden>
                    </fieldset>
                </form>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="modal_submit" form="user_form">บันทึก</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">แก้ไขรหัสผ่าน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="cmxform" id="password_form" method="post">
                    <fieldset>

                        <div class="form-group">
                            <label for="edit_password">รหัสผ่าน</label>
                            <input id="edit_password" name="edit_password" class="form-control"
                                title="ใส่ตัวอักษรภาษาอังกฤษและตัวเลข" type="password">
                        </div>
                        <div class="form-group">
                            <label for="edit_confirm_password">ยืนยันรหัสผ่าน</label>
                            <input id="edit_confirm_password" name="edit_confirm_password" class="form-control"
                                type="password">
                        </div>
                    </fieldset>
                </form>
                <input id="user_id" name="user_id" hidden>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" onclick="editpassword()">บันทึก</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {

    $("#user_form").validate({

        rules: {
            username: "required",
            password: {
                required: true,
                minlength: 6
            },
            status: "required",
            confirm_password: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            username: "กรุณากรอกชื่อผู้ใช้",
            password: {
                required: "กรุณากรอกรหัส",
                minlength: "รหัสผ่านไม่ถึง 6 ตัวอักษร"
            },
            status: "กรุณาเลือกข้อมูล",
            confirm_password: {
                required: "กรุณากรอกรหัสยืนยัน",
                equalTo: "รหัสผ่านไม่ตรงกัน"
            }
        },
        errorPlacement: function(label, element) {
            label.addClass('mt-2 text-danger');
            label.insertAfter(element);
        },
        highlight: function(element, errorClass) {
            $(element).parent().addClass('has-danger')
            $(element).addClass('form-control-danger')
        }

    });

    $("#password_form").validate({

        rules: {
            edit_password: {
                required: true,
                minlength: 6
            },
            edit_confirm_password: {
                required: true,
                equalTo: "#edit_password"
            }
        },
        messages: {
            edit_password: {
                required: "กรุณากรอกรหัส",
                minlength: "รหัสผ่านไม่ถึง 6 ตัวอักษร"
            },
            edit_confirm_password: {
                required: "กรุณากรอกรหัสยืนยัน",
                equalTo: "รหัสผ่านไม่ตรงกัน"
            }
        },
        errorPlacement: function(label, element) {
            label.addClass('mt-2 text-danger');
            label.insertAfter(element);
        },
        highlight: function(element, errorClass) {
            $(element).parent().addClass('has-danger')
            $(element).addClass('form-control-danger')
        }

    });


    user_table = $('#user_table').DataTable({

        ajax: {
            url: "<?=site_url('/User/get_user')?>",
            dataSrc: ''
        },
        columns: [{
                data: 'id',
                render: function(data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            {
                data: 'username'
            },
            {
                data: 'status'
            },
            {
                data: 'id',
                render: function(data, type, row, meta) {

                    return `
						<div class="btn_td">
							<button type="button" class="btn btn-warning btn-icon-text" onclick="edit_user(${data})">
							แก้ไขรหัสผ่าน
							</button>
						</div>
						<div class="btn_td">
							<button type="button" class="btn btn-danger btn-icon-text" onclick="delete_user(${data})">
							ลบข้อมูลผู้ใช้
							</button>
						</div>
						`;
                }
            }
        ]
    });

});

function editpassword() {
    if (!$("#password_form").valid()) {
        return
    }
    var pw = $("#edit_password").val();
    var user_id = $("#user_id").val();

    var userDetails = {
        password: pw,
        user_id
    }

    var saveData = $.ajax({
        type: 'POST',
        url: "<?=site_url('/User/password_form')?> ",
        data: userDetails,
        dataType: "json",
        success: function(resultData) {
            if (resultData["status"] == "success") {
                $.toast({
                    heading: 'สำเร็จ',
                    text: resultData["msg"],
                    showHideTransition: 'slide',
                    icon: 'success',
                    loaderBg: '#46c35f',
                    position: 'top-right'
                })
                user_table.ajax.reload();
                $('#modalPassword').modal('hide');
            } else if (resultData["status"] == "edited") {
                $.toast({
                    heading: 'สำเร็จ',
                    text: resultData["msg"],
                    showHideTransition: 'slide',
                    icon: 'success',
                    loaderBg: '#46c35f',
                    position: 'top-right'
                })
                user_table.ajax.reload();
                $('#modalPassword').modal('hide');
            } else if (resultData["status"] == "exits") {
                $.toast({
                    heading: 'ไม่สำเร็จ',
                    text: resultData["msg"],
                    showHideTransition: 'slide',
                    icon: 'error',
                    loaderBg: '#f2a654',
                    position: 'top-right'
                })
            } else {
                $.toast({
                    heading: 'ไม่สำเร็จ',
                    text: resultData["msg"],
                    showHideTransition: 'slide',
                    icon: 'error',
                    loaderBg: '#f2a654',
                    position: 'top-right'
                })
            }
        }
    });
}

function logout() {
    document.getElementById("username").disabled = true;
    $("#user_form")[0].reset();
    $.ajax({
        type: 'POST',
        url: "<?=site_url('/User/get_user_once')?>",
        data: {
            id
        },
        dataType: 'json',
        success: function(data) {
            $('#username').val(data['username']);
            $('#status').val(data['status']);
        }
    });
    $("#submit_type").val(id);
    $('#modalUser').modal('show');

};

function new_user() {
    $("#user_form")[0].reset();
    $("#submit_type").val("new");
    $('#modalUser').modal('show');
    document.getElementById("username").disabled = false;
};

function edit_user(id) {
    $('#user_id').val(id);

    console.log($('#user_id').val());
    $("#password_form")[0].reset();
    $('#modalPassword').modal('show');
};

$("#user_form").on("submit", function(event) {
    event.preventDefault();

    if (!$("#user_form").valid()) {
        return
    }
    var user = $("#username").val();
    var pw = $("#password").val();
    var st = $("#status").val();
    var type = $("#submit_type").val();



    var userDetails = {
        username: user,
        password: pw,
        status: st,
        submit_type: type,
    }

    var saveData = $.ajax({
        type: 'POST',
        url: "<?=site_url('/User/user_form')?> ",
        data: userDetails,
        dataType: "json",
        success: function(resultData) {
            if (resultData["status"] == "success") {
                $.toast({
                    heading: 'สำเร็จ',
                    text: resultData["msg"],
                    showHideTransition: 'slide',
                    icon: 'success',
                    loaderBg: '#46c35f',
                    position: 'top-right'
                })
                user_table.ajax.reload();
                $('#modalUser').modal('hide');
            } else if (resultData["status"] == "edited") {
                $.toast({
                    heading: 'สำเร็จ',
                    text: resultData["msg"],
                    showHideTransition: 'slide',
                    icon: 'success',
                    loaderBg: '#46c35f',
                    position: 'top-right'
                })
                user_table.ajax.reload();
                $('#modalUser').modal('hide');
            } else if (resultData["status"] == "exits") {
                $.toast({
                    heading: 'ไม่สำเร็จ',
                    text: resultData["msg"],
                    showHideTransition: 'slide',
                    icon: 'error',
                    loaderBg: '#f2a654',
                    position: 'top-right'
                })
            } else {
                $.toast({
                    heading: 'ไม่สำเร็จ',
                    text: resultData["msg"],
                    showHideTransition: 'slide',
                    icon: 'error',
                    loaderBg: '#f2a654',
                    position: 'top-right'
                })
            }
        }
    });

});

function delete_user(id) {
    swal({
        title: 'ลบข้อมูลผู้ใช้?',
        text: "คุณแน่ใจที่จะต้องการลบข้อมูล",
        icon: 'warning',
        buttons: {
            confirm: {
                text: "ยืนยัน",
                value: true,
                visible: true,
                className: "btn btn-primary",
                closeModal: true
            },
            cancel: {
                text: "ยกเลิก",
                value: null,
                visible: true,
                className: "btn btn-danger",
                closeModal: true,
            },
        }
    }).then((result) => {
        if (result) {
            $.ajax({
                type: 'POST',
                url: "<?=site_url('/user/delete_user')?>",
                data: {
                    id
                },
                success: function(result) {
                    if (result != 'false') {
                        $.toast({
                            heading: 'สำเร็จ',
                            text: 'ลบข้อมูลผู้ใช้สำเร็จ',
                            showHideTransition: 'slide',
                            icon: 'info',
                            loaderBg: '#46c35f',
                            position: 'top-right'
                        })
                        user_table.ajax.reload();
                    }

                }

            });

        }

    })
}
</script>