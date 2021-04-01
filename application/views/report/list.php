<style>
    .btn_td {
        margin: 5px
    }
</style>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-10">
                <h4 class="card-title">รายการแจ้งข้อมูล</h4>
            </div>



        </div>
        <div class="row mb-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table id="user_table" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อสนาม</th>
                                <th>หมายเลขหลอดไฟ</th>
                                <th>วันที่แจ้งข้อมูล</th>
                                <th></th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>

        <div class="row justify-content-end">
            <div class="col-3">
                <div class="text-center">
                    <button type="button" class="btn btn-primary btn-rounded btn-icon-text btn-sm" onclick="send_report()">
                        <i class="mdi mdi-plus " ;></i>
                        สร้างรายการแจ้งซ่อม
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        user_table = $('#user_table').DataTable({

            ajax: {
                url: "<?= site_url('/report/get_all_report') ?>",
                dataSrc: ''
            },
            columns: [{
                    data: 'id',
                    //sport: 'sportfield_id'
                    render: function(data, type, row, meta) {
                        return `
                    <input type="checkbox" name="light-number" value="${data}" data-sportfieldid="${row.sportfield_id}">
                    `
                    }
                },
                {
                    data: 'sportfield_name'
                },
                {
                    data: 'repair_light'
                },
                {
                    data: 'report_date'
                },
                {
                    data: 'id',
                    render: function(data, type, row, meta) {

                        return `
						<div class="btn_td">
							<button type="button" class="btn btn-danger btn-icon-text" onclick="delete_report(${data})">
							ลบการแจ้งข้อมูล
							</button>
						</div>
						`;
                    }
                }
            ]
        });

    });


    function send_report() {
        let light = []
        let sportfield_id = []
        let stat = true;
        $("input:checkbox[name=light-number]:checked").each(function() {
            var sportfieldid = $(this).attr('data-sportfieldid');
            light.push(parseInt($(this).val()));
            sportfield_id.push(parseInt(sportfieldid));


        });
        if ((new Set(sportfield_id)).size == 1) {
            // if (stat) {
            swal({
                title: 'ยืนยันการสร้างรายการแจ้งซ่อม?',
                // text: "รายการที่ไม่ถูกเลือกจะถูกลบหลังจากสร้างรายการแจ้งซ่อม",
                text: "สร้างรายการแจ้งซ่อมจากรายการที่เลือก",
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
                        url: "<?= site_url('/report/create_report') ?>",
                        data: {
                            light,
                        },
                        dataType: "json",
                        success: function(resultData) {
                            swal({
                                title: 'สร้างรายการแจ้งซ่อมสำเร็จ!',
                                text: 'สามารถดูรายละเอียดได้ที่ การแจ้งซ่อม->การแจ้งซ่อมทั้งหมด',
                                icon: 'success',
                                button: {
                                    text: "ตกลง",
                                    value: true,
                                    visible: true,
                                    className: "btn btn-primary"
                                }
                            }).then(() => {
                                user_table.ajax.reload();
                            })
                        }
                    })
                }
            })
        } else if (!(new Set(sportfield_id)).size) {
            swal({
                title: 'กรุณาเลือกรายการ',
                text: "กรุณาเลือกรายการซ่อมแซมสนามใหม่อีกครั้ง",
                icon: 'warning',
                buttons: {
                    cancel: {
                        text: "ยกเลิก",
                        value: null,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true,
                    },
                }
            })
        } else {
            swal({
                title: 'รายการสนามซ้ำกัน',
                text: "รายการสนามซ้ำกัน กรุณาเลือกสนามใหม่อีกครั้ง",
                icon: 'warning',
                buttons: {
                    cancel: {
                        text: "ยกเลิก",
                        value: null,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true,
                    },
                }
            })
        }

    }

    function delete_report(id) {
        swal({
            title: 'ลบการแจ้งข้อมูล?',
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
                    url: "<?= site_url('report/delete_report') ?>",
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
                            })
                            user_table.ajax.reload();
                        }

                    }

                });

            }

        })
    }
</script>