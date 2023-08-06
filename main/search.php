<?php require('subpage/head.inc.php'); ?>

<body class="d-flex flex-column min-vh-100">
    <?php require('subpage/nav2.inc.php'); ?>
    <section>
        <div class="container mt-5">
            <form name="search" method="post">
                <div class="input-group border ">
                    <input type="text" name="search_input" placeholder="Search.." aria-describedby="button-addon3" class="form-control bg-none border-0">
                    <div class="input-group-append border-0">
                        <button id="button-addon3" type="submit" class="btn btn-link btns"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="flex-container">
            <?php
            if (isset($_POST['search_input'])) {
                if (!empty($_POST['search_input'])) {
                    $search_input = $_POST['search_input'];
                    echo <<<HTML
                <div class="camptext mt-5 mb-3">
                    <h1>
                        Result of '<span style='color: #ee6fff;'>$search_input</span>'
                    </h1>
                </div>
                HTML;

                    // connect db
                    require 'server.php';

                    //import pagination
                    require 'pagination-v2.class.php';
                    $page = new PaginationV2();

                    // select data by input
                    $sql = "SELECT * FROM news WHERE topic LIKE '%$search_input%'";
                    $result = $page->query($mysqli, $sql, 5);

                    $num_rows = $result->num_rows;

                    if ($num_rows == 0) {
                        echo '<p>ไม่มีข้อมูล</p>';
                    } else {
                        if ($result) {
                            while ($dbarr = $result->fetch_assoc()) {
                                $id = $dbarr['id'];
                                $topic = $dbarr['topic'];

                                $content = $dbarr['content'];
                                $formattedContent = nl2br($content);

                                $UploadDate = $dbarr['UploadDate'];
                                // format jesusYear ti buddhishYear
                                $buddhistYear = intval(date('Y', strtotime($UploadDate))) + 543;
                                $buddhistDate = date('d/m/', strtotime($UploadDate)) . $buddhistYear;

                                $img = $dbarr['img'];
                                $category = $dbarr['category'];
                                echo <<<HTML
                                <!-- output -->
                                <div class="container-sm" style="max-width: 1100px;">
                                    <div class="card mb-3 mx-1">
                                        <div class="row g-0">
                                            <div class="col-md-6">
                                                <img src="$img" class="img-fluid rounded-start">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card-body d-flex flex-column justify-content-between" style="height: 100%">
                                                    <div>
                                                        <a class="card-title fs-4 text-decoration-none" id="topic" href="show_detail.php?id=$id">$topic</a>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <p class="card-text" style="margin: 0; color: #ee6fff;">$category</p>
                                                        <p class="card-text text-muted m-0">$buddhistDate</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                HTML;
                            }
                        }
                    }
                }
            }
            ?>
        </div>
    </section>
    <?php require('subpage/footer.inc.php'); ?>
</body>

</html>