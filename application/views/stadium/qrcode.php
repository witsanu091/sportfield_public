<style>
.file {
    visibility: hidden;
    position: absolute;
}

.qrocde {
    width: 100%;
}
</style>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">


                <div class="row justify-content-center">
                    <div class="col-auto">
                        <img src="<?=base_url("/qrcode.png")?>" class="img rounded qrcode">
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
                    `<button type="button" class="btn btn-success" id="detailButton" onclick="show_detail(${data})">รายละเอียด</button><br><br>
                        <button type="button" class="btn btn-warning btn-sm" id="editButton" onclick="edit_stadium(${data})">แก้ไขข้อมูลสนาม</button><br><br>
                        <button type="button" class="btn btn-danger" id="deleteButton" onclick="delete_stadium(${data})">ลบสนาม</button><br>`
                return detailButton;
            },
        }, ],
    });
});

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
                $('#preview_image').attr('src', '<?=site_url("/images/")?>' + $('#file').val());
            } else {
                $('#preview_image').attr('src', 'https://placehold.it/960x600');
            }
            if ($('#file2').val()) {
                $('#preview_sturture_image').attr('src', '<?=site_url("/images/")?>' + $(
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
                $('#addedit_image').attr('src', '<?=site_url("/images/")?>' + $('#file').val());
            } else {
                $('#addedit_image').attr('src', 'https://placehold.it/960x600');
            }
            if ($('#file2').val()) {
                $('#addedit_sturture_image').attr('src', '<?=site_url("/images/")?>' + $(
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