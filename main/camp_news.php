<?php require('subpage/head.inc.php');?>
<body>
<div id="flex-container">
    <?php require('subpage/nav2.inc.php');?>
    <section>
        <div class="container-fluid">
            <div class="camptext mt-5 mb-3">
                <h1>
                    ค่าย
                </h1>
            </div>
            <?php
            // conect database
            include 'server.php';
            mysqli_query($conn, 'Use tup_news;');

            // check if user use date filter
            if (empty($_POST['date'])) {
                $query = "  SELECT * FROM news 
                            WHERE category='tcas67' 
                            ORDER BY UploadDate DESC";
                $result = mysqli_query($conn, $query);
            } else {
                $UploadDate = $_POST['date'];
                $query =  " SELECT * FROM news 
                            WHERE category='tcas67' 
                            AND UploadDate='$UploadDate'
                            ORDER BY UploadDate DESC";
                $result = mysqli_query($conn, $query);
            }

            // get data
            while ($dbarr = mysqli_fetch_array($result)) {
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
            <?php
            } 
            mysqli_close($conn);
            ?>
            </div>
        </div>
    </section>
    <?php require('subpage/pagination.inc.php');?>
    <?php require('subpage/footer.inc.php');?>
</div>
</body>

</html>