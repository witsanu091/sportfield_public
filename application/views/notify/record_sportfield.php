<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">ประวัติส่งซ่อมแต่ละสนาม</h4>
                <!-- Modal starts show ประวัติการซ่อม-->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog " role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <p> ชื่อสนาม:
                                    <p id="sportfield_name"></p>
                                </p>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-sm-8">
                                    <input type="hidden" class="form-control" id="sportfield_id" name='Id'>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table id="record_modal" class="table">
                                                <thead>
                                                    <tr>
                                                        <!-- <th class='text-center'>ลำดับ</th> -->
                                                        <th class='text-center'>รหัสการซ่อม</th>
                                                        <th class='text-center'>หลอด</th>
                                                        <th class='text-center'>วันที่ซ่อม</th>
                                                        <th class='text-center'>งบประมาณ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
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
                                        <th class='text-center'>สนาม</th>
                                        <th class='text-center'>สถานะ</th>
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
<script>
    $(document).ready(function() {
        let count_row = 0;
        $('#record_modal').DataTable();
        notify_table = $('#notify_table').DataTable({
            ajax: {
                "url": "<?php echo site_url('notify/get_record_repair') ?>",
                "datasrc": "data",
            },
            "columns": [{
                data: 'sportfield_id',
                render: function(data, type, row, meta) {
                    return ++count_row;
                },
                "data": "id"
            }, {
                "data": "sportfield_name"
            }, {
                "data": "sportfield_detail"
            }, ],
            "columnDefs": [{
                "targets": 3,
                "data": "id",
                "render": function(data, type, row, meta) {
                    orderButton =
                        `<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" onclick="getNotifyID('${row.id}')">ประวัติส่งซ่อม</button>`
                    return orderButton;
                }
            }, ]
        });
    });

    function getNotifyID(id) { //show data of current product before delete
        var showData = $.ajax({
            type: 'POST',
            url: "<?= site_url('/notify/showSportFieldName') ?>",
            data: {
                id
            },
            dataType: "json",
            success: function(resultData) {
                // resultData = json_decode(resultData);
                $("#sportfield_name").text(resultData["sportfield_name"]);
                let count_row = 0;
                sportField_table = $('#record_modal').DataTable({
                    ajax: {
                        "url": "<?php echo site_url('notify/get_record_modal_repair') ?>/" + id,
                        "datasrc": "data",
                    },
                    "columns": [{
                            "data": "notifyrepair_id"
                        },
                        {
                            "data": "repair_light"
                        }, {
                            "data": "notify_end_date"
                        }, {
                            "data": "repair_price"
                        }
                    ],
                    bDestroy: true
                });

            }
        })
    }
</script>