<div class="container-fluid arti" id="arti">
    <div class="mshowd d-flex mt-4 mx-3">
        <div class="imgarti">
            <img src="<?= $img ?>">
        </div>
        <div class="container">
            <div class="artide">
                <div class="datek mt-4">
                    <h4 class="me-auto dtxt"><i class="fa-regular fa-calendar" style="margin-right: 10px;"></i><?= $UploadDate ?></h4>
                    <a class="ms-auto dtxt" href="<?php echo $category ?>_news.php"><?= $category ?></a>
                </div>
                <div class="topic mt-4 mb-2">
                    <H1><?= $topic ?></H1>
                </div>
                <div class="contenta mt-5">
                    <p class="fs-5"><?php echo $formattedContent . '<br><br>' ?></p>
                </div>
            </div>
        </div>
    </div>

</div>