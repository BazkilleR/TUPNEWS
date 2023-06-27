<?php require('subpage/head.inc.php'); ?>

<body>
    <div id="flex-container">
        <?php require('subpage/nav2.inc.php'); ?>
        <section>
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-center">
                    <div>
                        <h1>
                            CAMP
                        </h1>
                    </div>
                </div>
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
                        $topic = $dbarr['topic'];
                        $descr = $dbarr['descr'];
                        $UploadDate = $dbarr['UploadDate'];
                        $img = $dbarr['img'];
                ?>
                        <div class="newscard">
                            <!-- CARD -->
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="<?= $img ?>" class="img-fluid rounded-start">
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
            echo '</div>';
        echo '</section>';
        require('subpage/footer.inc.php'); //footer
        ?>
        </div>
</body>

</html>