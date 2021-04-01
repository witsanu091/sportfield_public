<style>
    div.header {
        background: #A73B24;
        padding: 10px;
        color: white;
        text-align: center;
    }

    #text {
        display: block;
        width: 100px;
        word-wrap: break-word;
    }

    .input-helper::before {
        border-color: #A73B24 !important;
    }

    input[type="checkbox"]:checked+.input-helper::before {
        background: #A73B24 !important;
    }

    .link {
        cursor: pointer;
    }

    .border-test {
        border-style: solid;
        border-width: thin;
    }
</style>



<div class="header row">
    <div class="col-12">
        <h1 class="">ระบบแจ้งซ่อมแซมไฟฟ้า</h1>
    </div>
</div>
<br />
<h1 class="text-center" id="notivfy_id"><?php echo $information->sportfield_name; ?></h1>
<div class="row justify-content-center mb-5">
    <div class="col-12">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <img src="<?= base_url("/images/" . $information->sportfield_sturture_image) ?>" width="100%" class="img rounded">
            </div>
        </div>
    </div>



    <div class="col-11 justify-content-center">
        <p class="text-muted stadium-name">หมายเลขหลอดที่ต้องการแจ้งซ่อม:</p>
    </div>

    <div class="col-11">

        <div class="row">
            <?php
            for ($i = 1; $i <= (int) $information->sportfield_light_amount; $i++) {
            ?>
                <div class="col-3 col-md-1 ">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="light-number" value="<?= $i ?>" <?php

                                                                                                                    if (in_array($i, $reported)) {
                                                                                                                        echo "checked disabled";
                                                                                                                    }
                                                                                                                    ?>>
                            <?= $i ?>
                    </div>

                </div>
            <?php
            }
            ?>
        </div>
    </div>


    <div class="col-11 ">
        <div class="row justify-content-end">
            <div class="col-auto">
                <button type="button" class="btn btn-success btn-md mr-2" onclick="send_inform(<?= $information->id ?>)">แจ้งซ่อม</button>
                <button type="button" class="btn btn-danger btn-md" onclick="reload()">ยกเลิก</button>
            </div>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">สถิติการซ่อม</h2>
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

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var id = <?php echo $information->id; ?>;
        $('#record_modal').DataTable({
            "ajax": {
                "url": "<?php echo site_url('/report/statRepair/{id}') ?>",
                "method": 'POST',
                "data": {
                    id: id
                },
                "datasrc": "data",
            },
            "columns": [{
                    "data": "notifyrepair_id"
                },
                {
                    "data": "repair_light"
                },
                {
                    "data": "notify_end_date"
                },
                {
                    "data": "repair_price"
                },
            ]
        });
    });



    function history(sport_fields_id) {
        window.location.href = `<?= site_url() ?>report/history/${sport_fields_id}`
    }

    function reload() {
        window.location.href = "<?= site_url() ?>/report/stadium"
    }

    function send_inform(sport_fields_id) {
        let light = []
        $("input:checkbox[name=light-number]:checked").each(function() {
            light.push($(this).val());
        });


        $.ajax({
            type: 'POST',
            url: "<?= site_url('/report/send_inform') ?>",
            data: {
                light,
                sport_fields_id
            },
            dataType: "json",
            success: function(data) {
                if (data.status == "error") {
                    swal({
                        title: 'แจ้งซ่อมไม่สำเร็จ!',
                        text: data.msg,
                        icon: 'error',
                        button: {
                            text: "ตกลง",
                            value: true,
                            visible: true,
                            className: "btn btn-primary"
                        }
                    }).then(() => {
                        window.location.href = ""
                    });
                } else {
                    swal({
                        title: 'แจ้งซ่อมสำเร็จ!',
                        text: 'ขอบคุณสำหรับการแจ้งข้อมูล',
                        icon: 'success',
                        button: {
                            text: "ตกลง",
                            value: true,
                            visible: true,
                            className: "btn btn-primary"
                        }
                    }).then(() => {
                        window.location.href = ""
                    });
                }
            }
        })






    }

    function report(id) {
        let notify = [];
        $.each($("input[name='light_number']:checked"), function() {
            notify.push($(this).val());
        });

        if (notify.length == 0) {
            alert("กรุณาเลือกก่อนแจ้งซ่อม");
            return;
        } else {
            swal("สำเร็จ", "ระบบได้ทำการแจ้งซ่อมแล้ว", "success");
            location.reload();
        }
        $.ajax({
            type: 'POST',
            url: "<?= site_url('/report/notify_stadium') ?>",
            data: {
                notify: notify,
                id: id
            },
            dataType: 'json',
            success: function(data) {

            }
        });
    }
</script>