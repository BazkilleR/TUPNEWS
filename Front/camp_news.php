<?php require('subpage/head.inc.php'); ?>

<body>
    <?php require('subpage/nav2.inc.php'); ?>
    <div class="header-text">
        <h1>ข่าวค่าย</h1>
    </div>
    <div class="date-filter">
        <form action="" method="post">
            <input type="date" name="date">
            <input type="submit" value="ยืนยัน">
        </form>
    </div>
    <div class="flex-container">
        <?php
        // conect database
        include 'server.php';

        // check if user use date filter
        if (empty($_POST['date'])) {
            $sql = "  SELECT * FROM news 
                        WHERE category='camp' 
                        ORDER BY UploadDate DESC";
            $result = $mysqli->query($sql);
        } else {
            $UploadDate = $_POST['date'];
            $sql =  " SELECT * FROM news 
                        WHERE category='camp' 
                        AND DATE(UploadDate)='$UploadDate'
                        ORDER BY UploadDate DESC";
            $result = $mysqli->query($sql);
        }

        // get data
        if ($result) {
            while ($dbarr = $result->fetch_assoc()) {
                $topic = $dbarr['topic'];
                $descr = $dbarr['descr'];
                $category = $dbarr['category'];
                $UploadDate = $dbarr['UploadDate'];
                $img = $dbarr['img'];
        ?>

                <!-- output -->
                <div class="box">
                    <div class="img">
                        <img src="<?php echo $img ?>">
                    </div>
                    <div class="content">
                        <div class="topic-descr">
                            <div class="topic">
                                <a href="#">
                                    <h4><?php echo $topic ?></h4>
                                </a>
                            </div>
                            <div class="descr">
                                <p><?php echo $descr ?></p>
                            </div>
                        </div>
                        <div class="category-date">
                            <div class="category">
                                <p><?php echo $category ?></p>
                            </div>
                            <div class="date">
                                <p><?php echo $UploadDate ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end loop -->
        <?php
            }
        }
        $mysqli->close();
        ?>
    </div>
</body>

</html>