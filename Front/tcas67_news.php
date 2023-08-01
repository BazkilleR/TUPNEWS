<?php require('subpage/head.inc.php'); ?>

<body class="d-flex flex-column min-vh-100">
    <?php require('subpage/nav2.inc.php'); ?>
    <section>
        <h1 class="text-center mt-5 mb-4">TCAS67</h1>
        <div class="container-fluid">
            <div class="mb-5 Timer">
                <div class="card text-center round-5">
                    <h3 class="card-header" style="background-color: pink; color: whitesmoke; border-radius: 0.5em 0.5em 0 0;">Tgat</h3> 
                    <div class="card-body">
                        <h4 id="timer"></h4>
                    </div>
                </div>
                <div class="card text-center" >
                    <h3 class="card-header" style="background-color: #1E51DE; color: whitesmoke; border-radius: 0.5em 0.5em 0 0;">Tpat</h3>
                    <div class="card-body">
                        <h4 id="timer1"></h4>
                    </div>
                </div>
                <div class="card text-center">
                    <h3 class="card-header" style="background-color: #FFBF00; color: whitesmoke; border-radius: 0.5em 0.5em 0 0;">กสพท</h3>
                    <div class="card-body">
                        <h4 id="timer2"></h4>
                    </div>
                </div>
                <div class="card text-center">
                    <h3 class="card-header" style="background-color: #990F02; color: whitesmoke; border-radius: 0.5em 0.5em 0 0;">A-level</h3>
                    <div class="card-body">
                        <h4 id="timer3"></h4>
                    </div>
                </div>
            </div>
        </div>
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
        require('subpage/pagination.inc.php'); //pagination
        $mysqli->close();
        ?>
    </section>
    <?php require('subpage/footer.inc.php'); //footer
    ?>
</body>

</html>