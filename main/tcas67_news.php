<?php require('subpage/head.inc.php'); ?>

<body>
    <div id="flex-container">
        <?php require('subpage/nav2.inc.php'); ?>
        <section>
            <h1 class="text-center mt-5 mb-3">TCAS67</h1>

            <?php
            // conect database
            require 'server.php';
            require 'pagination-v2.class.php';
            $page = new PaginationV2();

            $sql =  "SELECT * FROM news 
                        WHERE category='รอบรั้วเตรียมพัฒน์' 
                        ORDER BY UploadDate DESC";
            $result = $page->query($mysqli, $sql, 5);

            // get data
            if ($result) {
                while ($dbarr = $result->fetch_assoc()) {
                    $id = $dbarr['id'];
                    $topic = $dbarr['topic'];
                    $UploadDate = $dbarr['UploadDate'];
                    $img = $dbarr['img'];
                    $category = $dbarr['category'];
                    echo <<<HTML
                        <!-- output -->
                        <div class="container " style="max-width: 50%;">
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-6">
                                        <img src="$img" class="img-fluid rounded-start">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body d-flex flex-column justify-content-between" style="height: 100%">
                                            <div>
                                                <a class="card-title fs-5 text-decoration-none" id="topic" href="show_detail.php?id=$id">$topic</a>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="card-text" style="margin: 0; color: #ee6fff;">$category</p>
                                                <p class="card-text text-muted m-0">$UploadDate</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        HTML;
                }
            }
            require('subpage/pagination.inc.php'); //pagination
            $mysqli->close();
            ?>

        </section>
        <?php require('subpage/footer.inc.php'); //footer
        ?>
    </div>
</body>

</html>