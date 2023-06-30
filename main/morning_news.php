<?php require('subpage/head.inc.php'); ?>

<body>
    <div id="flex-container">
        <?php require('subpage/nav2.inc.php'); ?>
        <section>
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-center mt-5">
                    <div>
                        <h1>
                            ข่าวสารหน้าเสาธง
                        </h1>
                    </div>
                </div>
                <div class="container">
                    <div class="testcard1">
                        <div class="fakesearch">
                            <div class="input-group mb-3" style="width:55%;">
                                <input type="text" class="form-control" placeholder="dd/mm/yy" aria-label="Recipient's username" 
                                aria-describedby="button-addon2" style="border-radius: 0;">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"
                                style="border-radius: 0;">
                                    <a href="search.php" style="text-decoration:none">ค้นหา</a>
                                </button>
                            </div>
                        </div>
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
                            WHERE category='morning' 
                            ORDER BY UploadDate DESC";
                    $result = $page->query($mysqli, $sql, 5);
                } else {
                    $UploadDate = $_POST['date'];
                    $sql =  " SELECT * FROM news 
                            WHERE category='morning' 
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
                            <div class="card mb-3 p-3 rounded-0" style="max-width: 540px;">
                                <div class="row">
                                    
                                            <div class="">
                                                <h5 class="card-title"><?= $topic ?></h5>
                                                <p class="card-text"><?= $descr ?></p>
                                            </div>
                                            <div class="d-flex flex-flow-row" style="gap: 350px;">
                                                <p class="card-text mb-0"><small class="text-body-secondary"><?= $UploadDate ?></small></p>
                                                <p class="mb-0">View 200</p>
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