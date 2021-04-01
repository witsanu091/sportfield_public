<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">รายการส่งซ่อม</h4>
                <!-- Modal starts show ดำเนินการแล้ว-->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg-6" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <p> รหัสส่งซ่อม:
                                    <p id="notifyrepair_id"></p>
                                </p>
                                <p> &nbsp&nbsp&nbspสถานะ: <p id="notify_status"></p>
                                </p>
                                <p> &nbsp&nbsp&nbspวันแจ้งซ่อม: <p id="notify_date"></p>
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

                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end modal -->
                <!-- Modal starts show ที่กำลังดำเนินการ-->
                <div class="modal fade" id="notPriceModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg-6" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <p> รหัสส่งซ่อม:
                                    <p id="notifyrepair_id_notPrice"></p>
                                </p>
                                <p> &nbsp&nbsp&nbspสถานะ: <p id="notify_status_notPrice"></p>
                                </p>
                                <p> &nbsp&nbsp&nbspวันแจ้งซ่อม: <p id="notify_date_notPrice"></p>
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
                                <table id="notPrice_Modal" class="table">
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
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end modal -->
                <!--โชว์ประวัติการซ่อม -->

                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="notify_table" class="table">
                                <thead>
                                    <tr>
                                        <th class='text-center'>ลำดับ</th>
                                        <th class='text-center'>สถานะ</th>
                                        <th class='text-center'>วันที่แจ้งซ่อม</th>
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
            "url": "<?php echo site_url('notify/get_notify_repair_all_worker') ?>",
            "datasrc": "data",
        },
        "columns": [{
                data: 'notify_id',
                render: function(data, type, row, meta) {
                    return ++count_row;
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
                        `<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#notPriceModal" onclick="getNotifyIDInput('${row.id}')">ประวัติส่งซ่อม<i class="mdi mdi-play-circle ml-1"></i></button>`
                    return orderButton;

                }
                if (row.notify_status == 'ดำเนินการเสร็จสิ้น') {
                    orderButton =
                        `<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" onclick="getNotifyID('${row.id}')">ประวัติส่งซ่อม<i class="mdi mdi-play-circle ml-1"></i></button>`
                    return orderButton;
                } else {}
            }
        }, ]
    });
});

function getNotifyID(id) { //show data of current product before delete
    var showData = $.ajax({
        type: 'POST',
        url: "<?=site_url('/notify/showNotifyID')?>",
        data: {
            id
        },
        dataType: "json",
        success: function(resultData) {
            // resultData = json_decode(resultData);
            $("#notifyrepair_id").text(resultData["id"]);
            $("#notify_status").text(resultData["notify_status"]);
            $("#notify_date").text(resultData["notify_date"]);
            $("#repair_price").text(resultData["repair_price"]);

            show_notify_table = $('#notify_modal').DataTable({
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
        url: "<?=site_url('/notify/showNotifyIdInput')?>",
        data: {
            id
        },
        dataType: "json",
        success: function(resultData) {
            // resultData = json_decode(resultData);
            $("#notifyrepair_id_notPrice").text(resultData["id"]);
            $("#notify_status_notPrice").text(resultData["notify_status"]);
            $("#notify_date_notPrice").text(resultData["notify_date"]);

            notPrice_Modal = $('#notPrice_Modal').DataTable({
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
</script>