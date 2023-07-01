<?php require('subpage/head.inc.php'); ?>

<body>
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
                        Result of '<span style='color: pink;'>$search_input</span>'
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
                                $descr = $dbarr['descr'];
                                $UploadDate = $dbarr['UploadDate'];
                                $img = $dbarr['img'];
                                $category = $dbarr['category'];
                                echo <<<HTML
                                <div class="box">
                                    <div class="img">
                                        <img src="$img">
                                    </div>
                                    <div class="content">
                                        <div class="topic">
                                            <a href="show_detail.php?id=$id">$topic</a>
                                        </div>
                                        <div class="category-date">
                                            <p class="category">$category</p>
                                            <p class="date">$UploadDate</p>
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