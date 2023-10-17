<section>
    <div class="container-xl py-5">
        <div id="main-news" class="row g-3">
            <div class="col-12 col-lg-8">
                <div class="row mb-3">
                    <div class="col-12 fs-1 head-title">ข่าวล่าสุด</div>
                </div>

                <?php
                // Connect to the database
                require 'server.php';

                // Select the latest 7 news articles
                $sql = "SELECT * FROM news ORDER BY UploadDate DESC LIMIT 7";
                $result = $mysqli->query($sql);

                if ($result) {
                    $count = 0;

                    while ($dbarr = $result->fetch_assoc()) {
                        $id = $dbarr['id'];
                        $topic = $dbarr['topic'];
                        $UploadDate = $dbarr['UploadDate'];

                        // Format UploadDate to Buddhist calendar
                        $buddhist_year = intval(date('Y', strtotime($UploadDate))) + 543;
                        $buddhist_date = date('d-m-', strtotime($UploadDate)) . $buddhist_year;

                        $category = $dbarr['category'];
                        $img = $dbarr['img'];

                        if ($count == 0) {
                ?>
                            <!-- Main News Article -->
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="card m-0 shadow-sm">
                                        <img src="<?= $img ?>" class="main-card" style="object-fit: cover;" />
                                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                                            <a href="show_detail.php?id=<?= $id ?>" class="card-title fs-2 stretched-link text-decoration-none" style="color: white;">
                                                <?= $topic ?>
                                            </a>
                                            <a href="<?= $category ?>_news.php" id="category-text" class="card-title text-decoration-none mb-0" style="color: #ffb7e0;">
                                                <?= $category ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3">
                            <?php
                        } else {
                            ?>
                                <!-- Other News Articles -->
                                <div class="col-md-12 small-screen-news">
                                    <div class="card h-100 shadow-sm">
                                        <div class="row g-0" style="height: 10rem; overflow: hidden;">
                                            <div class="col-4">
                                                <img src="<?= $img ?>" class="card-img w-100 h-100" style=" object-fit: cover;" />
                                            </div>
                                            <div class="col-8">
                                                <div class="card-body d-flex flex-column justify-content-end">
                                                    <a href="show_detail.php?id=<?= $id ?>" class="card-title stretched-link text-decoration-none">
                                                        <?= $topic ?>
                                                    </a>
                                                    <a href="<?= $category ?>_news.php" id="category-text" class="card-title text-decoration-none mb-0" style="color: #ffb7e0;">
                                                        <?= $category ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 large-screen-news">
                                    <div class="card h-100 shadow-sm">
                                        <img src="<?= $img ?>" class="card-img-top" style="height: 20vh; object-fit: cover;" />
                                        <div class="card-body d-flex flex-column justify-content-between">
                                            <a href="show_detail.php?id=<?= $id ?>" class="card-title stretched-link text-decoration-none">
                                                <?= $topic ?>
                                            </a>
                                            <a href="<?= $category ?>_news.php" id="category-text" class="card-title text-decoration-none mb-0" style="color: #ffb7e0;">
                                                <?= $category ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                    <?php
                        }
                        $count++;
                    }
                }
                    ?>
                            </div>
            </div>
            <div id="important-news" class="col-12 col-lg-4">
                <div class="row mb-3">
                    <div class="col fs-1 head-title">ข่าวสำคัญ</div>
                </div>

                <?php
                // Connect to the database (you can reuse the connection from above)

                // Select the latest 5 important news articles
                $sql = "SELECT * FROM news WHERE level='1' ORDER BY UploadDate DESC LIMIT 5";
                $result = $mysqli->query($sql);

                if ($result) {
                    $count = 0;

                    while ($dbarr = $result->fetch_assoc()) {
                        $id = $dbarr['id'];
                        $topic = $dbarr['topic'];
                        $UploadDate = $dbarr['UploadDate'];

                        // Format UploadDate to Buddhist calendar
                        $buddhist_year = intval(date('Y', strtotime($UploadDate))) + 543;
                        $buddhist_date = date('d-m-', strtotime($UploadDate)) . $buddhist_year;

                        $category = $dbarr['category'];
                        $img = $dbarr['img'];

                        if ($count == 0) {
                ?>
                            <!-- Important News Article -->
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="card w-100 h-100 shadow-sm">
                                        <img src="<?= $img ?>" class="card-img-top" style="object-fit: cover;" />
                                        <div class="card-body d-flex flex-column justify-content-end">
                                            <a href="show_detail.php?id=<?= $id ?>" class="card-title stretched-link text-decoration-none">
                                                <?= $topic ?>
                                            </a>
                                            <a href="<?= $category ?>_news.php" id="category-text" class="card-title text-decoration-none mb-0" style="color: #ffb7e0;">
                                                <?= $category ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        } else {
                            ?>
                                <!-- Other Important News Articles -->
                                <div class="col-12">
                                    <div class="card w-100 h-100 shadow-sm">
                                        <div class="row g-0" style="height: 10rem; overflow: hidden;">
                                            <div class="col-4">
                                                <img src="<?= $img ?>" class="card-img w-100 h-100" style="height: 10vh; object-fit: cover;" />
                                            </div>
                                            <div class="col-8">
                                                <div class="card-body h-100 d-flex flex-column justify-content-between">
                                                    <a href="show_detail.php?id=<?= $id ?>" class="card-title stretched-link text-decoration-none">
                                                        <?= $topic ?>
                                                    </a>
                                                    <a href="<?= $category ?>_news.php" id="category-text" class="card-title text-decoration-none mb-0" style="color: #ffb7e0;">
                                                        <?= $category ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php
                        }
                        $count++;
                    }
                }
                // Close the database connection
                $mysqli->close();
                    ?>
                            </div>
            </div>
        </div>
    </div>
</section>