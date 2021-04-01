<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">รายการส่งซ่อม</h4>
                <!-- Modal starts show ประวัติการซ่อม-->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg-6" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <p> รหัสส่งซ่อม:
                                    <output id="notifyrepair_id"></output>
                                </p>
                                <p> &nbsp&nbsp&nbspสถานะ: <p id="notify_status"></p>
                                </p>
                                <!-- <p> &nbsp&nbsp&nbspวันแจ้งซ่อม: <p id="notify_date"></p>
                                </p>-->
                                <p> &nbsp&nbsp&nbspราคา: <output id='repair_price'></output>
                                </p>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-sm-8">
                                    <input type="hidden" class="form-control" id="notify_id" name='Id'>
                                </div>
                                <div><input type="hidden" name="notify_status" id="notify_status"></div>
                                <table id="notify_modal" class="table">
                                    <thead>
                                        <tr>
                                            <th class='text-center'>สนาม</th>
                                            <th class='text-center'>หลอด</th>
                                            <th class='text-center'>วันที่แจ้งซ่อม</th>
                                            <th class='text-center'>งบประมาณ</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end modal -->
                <!--Modal กรอกราคาซ่อม -->
                <div class="modal fade" id="inputPriceModal" tabindex="-1" role="dialog" aria-labelledby="niceModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg-6" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <p> รหัสส่งซ่อม:
                                    <output id="notifyrepair_id_input"></output>
                                </p>
                                <p> &nbsp&nbsp&nbspสถานะ: </p><output id="notify_status_input"></output>
                                </p>
                                <p> &nbsp&nbsp&nbspวันซ่อม: </p><output id="notify_date_input"></output>
                                </p>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-sm-8">
                                    <input type="hidden" class="form-control" id="notify_id" name='Id'>
                                </div>
                                <div><input type="hidden" name="notify_status" id="notify_status"></div>
                                <table id="nice_modal" class="table">
                                    <input type="hidden" id=" id" name="id">
                                    <thead>
                                        <tr>
                                            <th class='text-center'>สนาม</th>
                                            <th class='text-center'>หลอด</th>
                                            <th class='text-center'>วันที่แจ้งซ่อม</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <form id="input_form">
                                    <div>ราคา: <input type="number" name="notify_price" id="notify_price"></div>
                                </form>
                                <button type="button" class="btn btn-sm btn-success" onclick="submitTest()">Submit</button>
                                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="notify_table" class="table">
                                <thead>
                                    <tr>
                                        <th class='text-center'>ลำดับ</th>
                                        <th class='text-center'>status</th>
                                        <th class='text-center'>วันแจ้งซ้อม</th>
                                        <th class='text-center'>action</th>
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
<!-- end ประวัติการซ่อม -->
<script>
    $(document).ready(function() {
        let count_row = 0;
        notify_table = $('#notify_table').DataTable({
            ajax: {
                "url": "<?php echo site_url('notify/get_notify_repair_all') ?>",
                "datasrc": "data",
            },
            "columns": [{
                    data: 'notify_id',
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    },
                    "data": "id"
                },
                {
                    "data": "notify_status"
                }, {
                    "data": "notify_date"
                },
            ],
            "columnDefs": [{
                "targets": 3,
                "data": "id",
                "render": function(data, type, row, meta) {
                    if (row.notify_status == 'กำลังดำเนินการ') {
                        orderButton =
                            `<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#inputPriceModal" onclick="getNotifyIDInput('${row.id}')">จัดการข้อมูล</button>`
                        return orderButton;

                    }
                    if (row.notify_status == 'ดำเนินการเสร็จสิ้น') {
                        orderButton =
                            `<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" onclick="getNotifyID('${row.id}')">ประวัติส่งซ่อม</button>`
                        return orderButton;
                    } else {}
                }
            }]
        });
    });

    function getNotifyID(id) { //show data of current product before delete
        var showData = $.ajax({
            type: 'POST',
            url: "<?= site_url('/notify/showNotifyID') ?>",
            data: {
                id
            },
            dataType: "json",
            success: function(resultData) {
                $("#notifyrepair_id").text(resultData["id"]);
                $("#notify_status").text(resultData["notify_status"]);
                $("#notify_date").text(resultData["notify_date"]);
                $("#repair_price").text(resultData["repair_price"]);

                notifyModal = $('#notify_modal').DataTable({
                    ajax: {
                        "url": "<?php echo site_url('notify/get_notify_modal_repair') ?>/" + id,
                        "datasrc": "data",
                    },
                    "columns": [{
                            "data": "sportfield_name"
                        },
                        {
                            "data": "repair_light"
                        }, {
                            "data": "notify_end_date"
                        },
                        {
                            "data": "repair_price"
                        }
                    ],
                    bDestroy: true
                });

            }
        })
    }

    function getNotifyIDInput(id) { //show data of current product before delete
        var showData = $.ajax({
            type: 'POST',
            url: "<?= site_url('/notify/showNotifyID') ?>",
            data: {
                id
            },
            dataType: "json",
            success: function(resultData) {
                $("#notifyrepair_id_input").text(resultData["id"]);
                $("#notify_status_input").text(resultData["notify_status"]);
                $("#notify_date_input").text(resultData["notify_date"]);

                notifyInputModal = $('#nice_modal').DataTable({
                    ajax: {
                        "url": "<?php echo site_url('notify/get_notify_input_modal_repair') ?>/" + id,
                        "datasrc": "data",
                    },
                    "columns": [{
                            "data": "sportfield_name"
                        },
                        {
                            "data": "repair_light"
                        }, {
                            "data": "notify_date"
                        },
                    ],
                    bDestroy: true
                });
            }
        })
    }

    function submitTest(id) {
        var notify_id = $("#notifyrepair_id_input").text();
        var notify_price = $('#notify_price').val();
        var setPrice = {
            notify_id: notify_id,
            notify_price: notify_price,
        }
        $.ajax({
            type: 'POST',
            url: "<?= site_url('/notify/inputPrice') ?>",
            data: setPrice,
            success: function(result) {
                if (notify_price == "") {
                    alert("กรุณากรอกราคาให้ถูกต้อง");
                    return false;
                } else {
                    $.toast({
                        heading: 'สำเร็จ',
                        text: 'ยืนยันราคาสำเร็จ',
                        showHideTransition: 'slide',
                        icon: 'info',
                        loaderBg: '#46c35f',
                        position: 'top-right',
                    })
                    $('#inputPriceModal').modal('hide');
                }
                notify_table.ajax.reload();
            }
        });
    }
</script>