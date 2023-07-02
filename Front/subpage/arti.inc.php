<div class="container-fluid">
    <div class="arti" id="arti">
        <div class="imgarti d-flex justify-content-center align-item-center">
            <img src="<?=$img?>">
        </div>
        <div class="details mx-4">
            <div class="artide">
                <div class="datek mt-4">
                    <h4 class="me-auto dtxt"><i class="fa-regular fa-calendar" style="margin-right: 10px;"></i><?=$UploadDate?></h4>
                    <a class="ms-auto dtxt" href="<?php echo $category?>_news.php"><?=$category?></a>
                </div>
                <div class="topic mt-4 mb-4">
                    <H1><?=$topic?></H1>
                </div>
                <div class="contenta mt-5" style="transform: translateY(-25px);">
                    <p><?=$content?></p>
                </div>
            </div>
        </div>
    </div>
</div>