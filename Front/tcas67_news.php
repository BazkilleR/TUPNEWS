<?php require('subpage/head.inc.php'); ?>

<body>
    <div id="flex-container">
        <?php require('subpage/nav2.inc.php'); ?>
        <section>
            <div class="container-fluid">
                <div class="camptext mt-5 mb-3">
                    <h1>
                        TCAS67
                    </h1>
                </div>
                <?php
                // conect database
                require 'server.php';
                require 'pagination-v2.class.php';
                $page = new PaginationV2();

                // check if user use date filter
                if (empty($_POST['date'])) {
                    $sql = "  SELECT * FROM news 
                            WHERE category='tcas67' 
                            ORDER BY UploadDate DESC";
                    $result = $page->query($mysqli, $sql, 5);
                } else {
                    $UploadDate = $_POST['date'];
                    $sql =  " SELECT * FROM news 
                            WHERE category='tcas67' 
                            AND UploadDate='$UploadDate'
                            ORDER BY UploadDate DESC";
                    $result = $page->query($mysqli, $sql, 5);
                }

                // get data
                if ($result) {
                    while ($dbarr = $result->fetch_assoc()) {
                        $topic = $dbarr['topic'];
                        $descr = $dbarr['descr'];
                        $UploadDate = $dbarr['UploadDate'];
                        $img = $dbarr['img'];
                ?>
                        <div class="newscard">
                            <!-- CARD -->
                            <div class="card mb-3 rounded-0 " style="max-width: 50%; height: 250px;">
                                <div class="row">
                                    <div class="col-md-5">
                                        <img src="<?= $img ?>" class="img-fluid rounded-0">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $topic ?></h5>
                                            <p class="card-text"><?= $descr ?></p>
                                            <p class="card-text"><small class="text-body-secondary"><?= $UploadDate ?></small></p>
                                        </div>
                                    </div>
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