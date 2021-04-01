<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
/* .btn_td {
    margin: 5px
} */

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

.btn-kku {
    color: #fff;
    background-color: #A73B24;
    border-color: #A73B24;
}

.img-custom {
    max-width: 80%;
    max-height: 300px;
}

.wrap-content {
    width: 100%;
}

.card-custom {
    border: 1px solid #f3f3f3;
    box-shadow: none;
    transition: transform .2s;
}

.card-custom:hover {
    box-shadow: 6px 11px 41px -28px #ecb390;
    -webkit-box-shadow: 6px 11px 41px -28px #ecb390;
    transform: scale(1.02);
    cursor: pointer;
}

.col-custom {
    margin: 10px;
}

.stadium-name {
    text-align: center;
    margin-top: 15px;
}
</style>


<div class="header row">
    <div class="col-12">
        <h1 class="">ระบบแจ้งซ่อมแซมไฟฟ้า</h1>

    </div>
</div>
<br />

<!-- <div class="content-wrapper"> -->
<div class="row justify-content-center">
    <div class="col-11">

        <div class="input-group">
            <input type="text" class="form-control" placeholder="ชื่อสนาม" id="search"
                aria-label="Recipient's username">
            <div class="input-group-append">
                <button class="btn btn-sm btn-kku fa fa-search" type="button" onclick="searchStadium()">
                    ค้นหา</button>

            </div>
        </div>

    </div>

</div>

<div class="row d-flex flex-col justify-content-center">
    <?php
foreach ($stadium as $key => $value) {
    ?>

    <div class="col-11 col-custom" onclick="goToStadium('<?=$value->id?>')">
        <div class="card card-custom">
            <div class="card-body row">
                <div class="col-sm-12 col-md-4 d-flex flex-row justify-content-center">
                    <img src="<?=base_url('images/' . $value->sportfield_image)?>" class="img-custom rounded"
                        alt="profile image">
                </div>
                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                    <div class="wrap-content">
                        <h2 class='stadium-name'><?=$value->sportfield_name?></h2>
                        <p class="text-muted stadium-name">รายละเอียด:
                            <?=$value->sportfield_detail?></p>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <?php }?>
</div>

<script>
function searchStadium() {
    window.location.href = `?search=` + $("#search").val()
}

function goToStadium(id) {
    window.location.href = `<?=site_url()?>/report/stadium_one/${id}`
}
</script>