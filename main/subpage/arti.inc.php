<section>
    <div class="container">
        <div class="mshowd d-flex mt-4 mx-3">
            <div class="d-flex justify-content-center align-items-center large-screen-img">
                <img src="<?= $img ?>">
            </div>
            <div class="details">
                <div class="artide">
                    <div class="datek mt-4">
                        <h4 class="me-auto dtxt"><i class="fa-regular fa-calendar" style="margin-right: 10px;"></i><?= $UploadDate ?></h4>
                        <a class="ms-auto dtxt" href="<?php echo $category ?>_news.php"><?= $category ?></a>
                    </div>
                    <div class="topic mt-4 mb-2">
                        <h1 style="font-weight: bolder;"><?= $topic ?></h1>
                    </div>

                    <div class="contenta mt-3">
                        <div class="mt-5 d-flex justify-content-center align-items-center small-screen-img">
                            <img class="img-fluid" src="<?= $img ?>">
                        </div>
                        <p><?php echo $formattedContent . '<br><br>' ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>