<?php require('subpage/head.inc.php'); ?>

<body>
    <div id="flex-container">
        <?php require('subpage/nav2.inc.php'); ?>
        <section>
            <div class="camptext mt-5 mb-3">
                <h1>
                    CAMP
                </h1>
            </div>
            <div class="flex-container">
                <?php
                // conect database
                require 'server.php';
                require 'pagination-v2.class.php';
                $page = new PaginationV2();

                // check if user use date filter
                if (empty($_POST['date'])) {
                    $sql = "  SELECT * FROM news 
                            WHERE category='camp' 
                            ORDER BY UploadDate DESC";
                    $result = $page->query($mysqli, $sql, 5);
                } else {
                    $UploadDate = $_POST['date'];
                    $sql =  " SELECT * FROM news 
                            WHERE category='camp' 
                            AND UploadDate='$UploadDate'
                            ORDER BY UploadDate DESC";
                    $result = $page->query($mysqli, $sql, 5);
                }

                // get data
                if ($result) {
                    while ($dbarr = $result->fetch_assoc()) {
                        $id = $dbarr['id'];
                        $topic = $dbarr['topic'];
                        $descr = $dbarr['descr'];
                        $UploadDate = $dbarr['UploadDate'];
                        $img = $dbarr['img'];
                        $category = $dbarr['category'];
                ?>
                        <!-- output -->
                        <div class="box">
                            <div class="img">
                                <img src="<?= $img ?>">
                            </div>
                            <div class="content">
                                <div class="topic">
                                    <a href="show_detail.php?id=<?php echo $id ?>"><?= $topic ?></a>
                                </div>
                                <div class="category-date">
                                    <p class="category"><?= $category ?></p>
                                    <p class="date"><?= $UploadDate ?></p>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                require('subpage/pagination.inc.php'); //pagination
                $mysqli->close();
                ?>

            </div>
        </section>
        <?php require('subpage/footer.inc.php'); //footer
        ?>
    </div>
</body>

</html>