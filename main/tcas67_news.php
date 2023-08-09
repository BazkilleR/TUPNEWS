<?php require('subpage/head.inc.php'); ?>

<body class="d-flex flex-column min-vh-100">
    <?php require('subpage/nav2.inc.php'); ?>
    <section>
        <h1 class="text-center mt-5 mb-4" style="font-weight: bolder; font-size: 4rem">TCAS67</h1>
        <div class="container-fluid">
            <div class="mb-5 Timer">
                <div class="card text-center round-5">
                    <h3 class="card-header" style="background-color: #F07C1C; color: whitesmoke; border-radius: 0.5em 0.5em 0 0; ">TGAT</h3>
                    <div class="card-body p-0">
                        <h4 class="mt-2 mb-0" id="timer"></h4>
                        <h2>Day</h2>
                    </div>
                </div>
                <div class="card text-center">
                    <h3 class="card-header" style="background-color: #1E51DE; color: whitesmoke; border-radius: 0.5em 0.5em 0 0;">TPAT</h3>
                    <div class="card-body p-0">
                        <h4 class="mt-2 mb-0" id="timer1"></h4>
                        <h2>Day</h2>
                    </div>
                </div>
                <div class="card text-center">
                    <h3 class="card-header" style="background-color: #058B04; color: whitesmoke; border-radius: 0.5em 0.5em 0 0;">กสพท</h3>
                    <div class="card-body p-0">
                        <h4 class="mt-2 mb-0" id="timer2"></h4>
                        <h2>Day</h2>
                    </div>
                </div>
                <div class="card text-center">
                    <h3 class="card-header" style="background-color: #C1272D; color: whitesmoke; border-radius: 0.5em 0.5em 0 0;  ">A-Level</h3>
                    <div class="card-body p-0">
                        <h4 class="mt-2 mb-0" id="timer3"></h4>
                        <h2>Day</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="m-3 d-flex justify-content-center align-items-center img1">
            <img class="imgtcas" src="img/TCAS.jpg">
        </div> -->
        <div class="container-sm" style="max-width: 1100px;">
            <?php
            // conect database
            require 'server.php';
            require 'pagination-v2.class.php';
            $page = new PaginationV2();

            $sql =  "SELECT * FROM news 
                WHERE category='TCAS67' 
                ORDER BY UploadDate DESC";
            $result = $page->query($mysqli, $sql, 5);

            // get data
            if ($result) {
                while ($dbarr = $result->fetch_assoc()) {
                    $id = $dbarr['id'];
                    $topic = $dbarr['topic'];

                    $UploadDate = $dbarr['UploadDate'];
                    // format jesusYear ti buddhishYear
                    $buddhistYear = intval(date('Y', strtotime($UploadDate))) + 543;
                    $buddhistDate = date('d/m/', strtotime($UploadDate)) . $buddhistYear;

                    $img = $dbarr['img'];
                    $category = $dbarr['category'];
                    echo <<<HTML
                    <!-- output -->
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-6">
                                    <img src="$img" style="object-fit: cover; width: 100%; height: 30vh">
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
                    HTML;
                }
            }
            require('subpage/pagination.inc.php'); //pagination
            $mysqli->close();
            ?>
        </div>
    </section>
    <?php require('subpage/footer.inc.php'); //footer
    ?>
</body>

</html>