<style>
.file {
    visibility: hidden;
    position: absolute;
}

.file2 {
    visibility: hidden;
    position: absolute;
}

.img-thumbnail {
    max-height: 500px;
}

.img-wrap {
    display: flex;
    justify-content: center;
}
</style>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-10">
                        <h4 class="card-title">ข้อมูลสนาม</h4>
                    </div>
                    <div class="col-2">
                        <div class="text-center">
                            <button type="button" class="btn btn-primary btn-sm btn-rounded" onclick="add_stadium()">
                                <i class="mdi mdi-plus " ;></i>เพิ่มสนาม</button>
                        </div>
                    </div>
                </div>

                <!-- start modal detail form -->
                <div class="modal fade" id="ShowDetailModal" tabindex="-1" role="dialog"
                    aria-labelledby="ShowDetailModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ShowDetailModalLabel">รายละเอียดสนาม</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="forms-sample" id="showDetailForm">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group img-wrap">
                                                    <img src="https://placehold.it/960x600" id="preview_image"
                                                        class="img-thumbnail"><br><br>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group img-wrap">
                                                    <img src="https://placehold.it/960x600" id="preview_sturture_image"
                                                        class="img-thumbnail"><br><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">ชื่อสนาม: </label>
                                            <div class="col-sm-9">
                                                <output type="text" class="form-control" id="show_stadium_name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">รายละเอียด: </label>
                                            <div class="col-sm-9">
                                                <output type="text" class="form-control" id="show_stadium_detail">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">จำนวนหลอดไฟ: </label>
                                            <div class="col-sm-9">
                                                <output type="number" class="form-control"
                                                    id="show_electric_lamps_amount">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal detail form -->

                <!-- start modal add & edit form -->
                <div class="modal fade" id="AddEditModal" tabindex="-1" role="dialog"
                    aria-labelledby="AddEditModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="AddEditModalLabel">แก้ไขข้อมูลสนาม</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="forms-sample" id="StadiumForm" enctype="multipart/form-data">
                                    <fieldset>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <div class="form-group img-wrap">
                                                    <img src="https://placehold.it/960x600" id="addedit_image"
                                                        class="img-thumbnail">
                                                </div>
                                                <div class="form-group">
                                                    <label>เพิ่มรูปสนาม</label>
                                                    <input type="file" class="file" id="image_file" name="file">
                                                    <div class="input-group my-3">
                                                        <input type="text" class="form-control" disabled
                                                            placeholder="อัพโหลดรูปภาพ" id="file" name="image">
                                                        <div class="input-group-append">
                                                            <button type="button"
                                                                class="browse btn btn-primary">ค้นหา</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="msg"></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group img-wrap">
                                                    <img src="https://placehold.it/960x600" id="addedit_sturture_image"
                                                        class="img-thumbnail">
                                                </div>
                                                <div class="form-group">
                                                    <label>เพิ่มรูปผังหลอดไฟในสนาม</label>
                                                    <input type="file" class="file2" id="sturture_file" name="file2">
                                                    <div class="input-group my-3">
                                                        <input type="text" class="form-control" disabled
                                                            placeholder="อัพโหลดรูปภาพ" id="file2" name="sturture">
                                                        <div class="input-group-append">
                                                            <button type="button"
                                                                class="browse btn btn-primary">ค้นหา</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="msg2"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="name" class="col-sm-3 col-form-label">ชื่อสนาม: </label>
                                            <div class="col-sm-9 form-group">
                                                <input type="hidden" class="form-control" id="stadium_id" name="id">
                                                <input type="text" class="form-control" id="name"
                                                    placeholder="กรอกชื่อสนาม" name="name" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="detail" class="col-sm-3 col-form-label">รายละเอียด: </label>
                                            <div class="col-sm-9 form-group">
                                                <input type="text" class="form-control" id="detail"
                                                    placeholder="กรอกรายละเอียดสนาม" name="detail" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="amount" class="col-sm-3 col-form-label">จำนวนหลอดไฟ: </label>
                                            <div class="col-sm-9 form-group">
                                                <input type="number" class="form-control" min="0" id="amount"
                                                    placeholder="กรอกจำนวนหลอดไฟฟ้า" name="amount" required>
                                            </div>
                                        </div>
                                        <input id="submit_type" name="submit_type" hidden>
                                    </fieldset>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" name="submit" id="submitButton"
                                    form="StadiumForm">ยืนยัน</button>
                                <button type="button" class="btn btn-light" data-dismiss="modal">ยกเลิก</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal add & edit form -->

                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="stadium-table" class="table">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อสนาม</th>
                                        <th>จำนวนหลอดไฟ</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    stadium_table = $('#stadium-table').DataTable({
        ajax: {
            url: "<?php echo site_url('Stadium/get_all_stadium') ?>",
            dataSrc: "data",
        },
        columns: [{
                data: "id",
                render: function(data, type, row, meta) {
                    return meta.row + 1;
                },
            },
            {
                data: "sportfield_name"
            },
            {
                data: "sportfield_light_amount"
            },
        ],
        columnDefs: [{
            targets: 3,
            data: "id",
            render: function(data, type, row, meta) {
                detailButton =
                    `<button type="button" class="btn btn-primary btn-sm" id="editButton" onclick="report(${data})">แจ้งข้อมูล</button><br><br>
                    <button type="button" class="btn btn-success" id="detailButton" onclick="show_detail(${data})">รายละเอียด</button><br><br>
                        <button type="button" class="btn btn-warning btn-sm" id="editButton" onclick="edit_stadium(${data})">แก้ไขข้อมูลสนาม</button><br><br>
                        <button type="button" class="btn btn-danger" id="deleteButton" onclick="delete_stadium(${data})">ลบสนาม</button><br>`
                return detailButton;
            },
        }, ],
    });
});


function report(id) {
    window.location.href = `<?=site_url('/report/stadium_one/')?>${id}`
}

function show_detail(id) {
    $('#showDetailForm').trigger('reset');
    var showData = $.ajax({
        type: 'POST',
        url: "<?=site_url('/Stadium/show_stadium_editForm')?>",
        data: {
            id
        },
        dataType: "json",
        success: function(data) {
            $("#show_stadium_name").val(data['sportfield_name']);
            $("#show_stadium_detail").val(data['sportfield_detail']);
            $("#show_electric_lamps_amount").val(data['sportfield_light_amount']);
            $('#file').val(data['sportfield_image']);
            $('#file2').val(data['sportfield_sturture_image']);
            if ($('#file').val()) {
                $('#preview_image').attr('src', '<?=base_url("/images/")?>' + $('#file').val());
            } else {
                $('#preview_image').attr('src', 'https://placehold.it/960x600');
            }
            if ($('#file2').val()) {
                $('#preview_sturture_image').attr('src', '<?=base_url("/images/")?>' + $(
                    '#file2').val());
            } else {
                $('#preview_sturture_image').attr('src', 'https://placehold.it/960x600');
            }
        },
    });
    $('#submit_type').val(id);
    $('#ShowDetailModal').modal('show');
}

function add_stadium() {
    $('#StadiumForm').trigger('reset');
    $('#addedit_image').attr('src', 'https://placehold.it/960x600');
    $('#addedit_sturture_image').attr('src', 'https://placehold.it/960x600');
    $('#submit_type').val("new");
    $('#AddEditModal').modal('show');
}

function edit_stadium(id) {
    $('#StadiumForm').trigger('reset');
    var showData = $.ajax({
        type: 'POST',
        url: "<?=site_url('/Stadium/show_stadium_editForm')?>",
        data: {
            id
        },
        dataType: "json",
        success: function(data) {
            $("#name").val(data['sportfield_name']);
            $("#detail").val(data['sportfield_detail']);
            $("#amount").val(data['sportfield_light_amount']);
            $('#file').val(data['sportfield_image']);
            $('#file2').val(data['sportfield_sturture_image']);
            if ($('#file').val()) {
                $('#addedit_image').attr('src', '<?=base_url("/images/")?>' + $('#file').val());
            } else {
                $('#addedit_image').attr('src', 'https://placehold.it/960x600');
            }
            if ($('#file2').val()) {
                $('#addedit_sturture_image').attr('src', '<?=base_url("/images/")?>' + $(
                    '#file2').val());
            } else {
                $('#addedit_sturture_image').attr('src', 'https://placehold.it/960x600');
            }
        }
    });
    $('#submit_type').val(id);
    $('#AddEditModal').modal('show');
}

function delete_stadium(id) {
    swal({
        title: 'ลบข้อมูล?',
        text: "คุณแน่ใจที่จะต้องการลบข้อมูล",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3f51b5',
        cancelButtonColor: '#ff4081',
        confirmButtonText: 'Great ',
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
                url: "<?=site_url('/Stadium/delete_stadium')?>",
                data: {
                    id
                },
                success: function(result) {
                    if (result != 'false') {
                        $.toast({
                            heading: 'สำเร็จ',
                            text: 'ลบข้อมูลสำเร็จ',
                            showHideTransition: 'slide',
                            icon: 'info',
                            loaderBg: '#46c35f',
                            position: 'top-right'
                        });
                        stadium_table.ajax.reload();
                        show_task(last_cond, last_view);
                    }
                }
            });
        }
    });
}

$(document).on("click", ".browse", function() {
    if ($('#image_file')) {
        let file = $(this)
            .parent()
            .parent()
            .parent()
            .find(".file");
        file.trigger("click");
    }
});

$('input[id="image_file"]').change(function(e) {
    let fileName = e.target.files[0].name;
    $("#file").val(fileName);

    let reader = new FileReader();
    reader.onload = function(e) {
        // get loaded data and render thumbnail.
        document.getElementById("preview_image").src = e.target.result;
        document.getElementById("addedit_image").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
});

$(document).on("click", ".browse", function() {
    if ($('#sturture_file')) {
        let file2 = $(this)
            .parent()
            .parent()
            .parent()
            .find(".file2");
        file2.trigger("click");
    }
});

$('input[id="sturture_file"]').change(function(e) {
    let fileName2 = e.target.files[0].name;
    $("#file2").val(fileName2);

    let reader2 = new FileReader();
    reader2.onload = function(e) {
        // get loaded data and render thumbnail.
        document.getElementById("preview_sturture_image").src = e.target.result;
        document.getElementById("addedit_sturture_image").src = e.target.result;
    };
    // read the image file as a data URL.
    reader2.readAsDataURL(this.files[0]);
});

$(document).ready(function(e) {
    $("#StadiumForm").validate({
        rules: {
            name: "required",
            detail: "required",
            amount: "required",
        },
        messages: {
            name: "กรุณากรอกชื่อสนาม",
            detail: "กรุณากรอกรายละเอียดสนาม",
            amount: "กรุณากรอกจำนวนหลอดไฟฟ้า",
        },
        errorPlacement: function(label, element) {
            label.addClass('mt-2 text-danger');
            label.insertAfter(element);
        },
        highlight: function(element, errorClass) {
            $(element).parent().addClass('has-danger')
            $(element).addClass('form-control-danger')
        },
    });
    $("#StadiumForm").on("submit", function(event) {
        event.preventDefault();
        if ($("#StadiumForm").valid()) {
            $.ajax({
                type: "POST",
                url: "<?=site_url('/Stadium/stadium_form')?>",
                data: new FormData(
                    this
                ), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false, // The content type used when sending data to the server.
                dataType: "json",
                cache: false, // To unable request pages to be cached
                processData: false, // To send DOMDocument or non processed data file it is set to false
                success: function(data) {
                    if (data["status"] == "success") {
                        $.toast({
                            heading: 'สำเร็จ',
                            text: data["msg"],
                            showHideTransition: 'slide',
                            icon: 'success',
                            loaderBg: '#46c35f',
                            position: 'top-right'
                        })
                        $('#AddEditModal').modal('hide');
                        $("#msg").html('');
                        $("#msg2").html('');
                        $('#addedit_image').attr('src', 'https://placehold.it/960x600');
                        $('#addedit_sturture_image').attr('src',
                            'https://placehold.it/960x600');
                        $("#StadiumForm")[0].reset();
                        stadium_table.ajax.reload();
                    } else if (data["status"] == "edited") {
                        $.toast({
                            heading: 'สำเร็จ',
                            text: data["msg"],
                            showHideTransition: 'slide',
                            icon: 'success',
                            loaderBg: '#46c35f',
                            position: 'top-right'
                        })
                        $('#AddEditModal').modal('hide');
                        $("#msg").html('');
                        $("#msg2").html('');
                        $('#addedit_image').attr('src', 'https://placehold.it/960x600');
                        $('#addedit_sturture_image').attr('src',
                            'https://placehold.it/960x600');
                        $("#StadiumForm")[0].reset();
                        stadium_table.ajax.reload();
                    } else if (data["status"] == "fail") {
                        $.toast({
                            heading: 'ไม่สำเร็จ',
                            text: data["msg"],
                            showHideTransition: 'slide',
                            icon: 'error',
                            loaderBg: '#f2a654',
                            position: 'top-right'
                        })
                    } else if (data["status"] == 'exist') {
                        $.toast({
                            heading: 'ไม่สำเร็จ',
                            text: data["msg"],
                            showHideTransition: 'slide',
                            icon: 'error',
                            loaderBg: '#f2a654',
                            position: 'top-right'
                        })
                    }
                },
                error: function(data) {
                    $("#msg").html(
                        '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> There is some thing wrong.</div>'
                    );
                    $("#msg2").html(
                        '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> There is some thing wrong.</div>'
                    );
                    stadium_table.ajax.reload();
                },
            });
        }
    });
});
</script>