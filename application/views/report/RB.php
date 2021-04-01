<style>
/* .btn_td {
    margin: 5px
} */

div.header {
    background: #b62f2f;
    padding: 10px;
    color: white;
    text-align: center;
}

#text {
    display: block;
    width: 100px;
    word-wrap: break-word;
}
</style>


<div class="header row">
    <div class="col-12">
        <h1 class="">ระบบแจ้งซ่อมแซมไฟฟ้า</h1>

    </div>
</div>
<br />
<div class="btn wrapper d-flex align-items justify-content-start justify-content-sm-center flex-wrap">
    <form class="Search ">
        <input class="btn btn-outline-info " id="search" type="text" size="25%" placeholder="หาชื่อสนาม"
            onkeyup="search_name()">
        <button type="submit" size="20%" class="btn btn-secondary "><i class="fa fa-search">ค้นหา</i></button>
    </form>
</div>

<!-- ตัวสำหรับข้อมูล -->
<!-- <div class=" card">
    <div class="card-body">
        <?php
foreach ($stadium as $key => $value) {
    ?>
                                                                                                                                                                                                                                                                                                                                                        <div
                                                                                                                                                                                                                                                                                                                                                            class="btn btn-secondary wrapper d-flex align-items-center justify-content-start justify-content-sm-center flex-wrap">
                                                                                                                                                                                                                                                                                                                                                            <div class="col-5">
                                                                                                                                                                                                                                                                                                                                                                <img src="<?=base_url("/images/" . $value->sportfield_image)?>" class="img-md rounded" width="100%">
                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                            <div class="wrapper ml-4">
                                                                                                                                                                                                                                                                                                                                                                <h4 class="font-weight-medium">ชื่อสนาม : <?php echo $value->sportfield_name ?></h4>
                                                                                                                                                                                                                                                                                                                                                                <p class="text-muted"> รายละเอียด:<?php echo $value->sportfield_detail ?></p>
                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                        <br />
        <?php }?>
    </div>
</div> -->

<!-- ปิด -->
<div class=" card">
    <div class="card-body">
        <div class="row">
            <?php
foreach ($stadium as $key => $value) {
    ?>
            <div class="btn btn-secondary wrapper d-flex align-items justify-content-start justify-content-sm-center flex-wrap"
                onclick="report_stadium(${data})">
                <div class="col-5">
                    <img src="<?=base_url("/images/" . $value->sportfield_image)?>" width="100%" class="img rounded">
                </div>
                <div id="name" class="col-7">
                    <h4 id="text">
                        ชื่อสนาม:<?php echo $value->sportfield_name ?>
                    </h4>
                    <div id="text">
                        รายละเอียด:<?php
$text = $value->sportfield_detail;
    $newtext = wordwrap($text, 5, "<br /> ");
    echo $value->sportfield_detail?>
                    </div>
                </div>
            </div>
            <br />
            <?php }?>
        </div>
    </div>
</div>

<div class=" card">
    <div class="card-body">
        <div class="row">
            <?php
foreach ($stadium as $key => $value) {
    ?>
            <div
                class="btn btn-secondary wrapper d-flex align-items-center justify-content-start justify-content-sm-center flex-wrap">
                <div class="col-5">
                    <img src="<?=base_url("/images/" . $value->sportfield_image)?>" width="100%" class="img rounded">
                </div>
                <div id="text" class="col-7">
                    <h4 class="font-weight-medium">ชื่อสนาม : <?php echo $value->sportfield_name ?></h4>
                    <div id="text">
                        รายละเอียด:<?php echo $value->sportfield_detail ?>
                    </div>
                </div>
            </div>
            <br />
            <?php }?>
        </div>
    </div>
</div>




<script>
function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    table = document.getElementById("name");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>