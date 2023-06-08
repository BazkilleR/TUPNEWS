<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home</title>
</head>

<body>
    <?php require('header.php'); ?>
    <div class="grid-container">
        <section class="left">
            <?php
            // connect database
            include('server.php');
            mysqli_query($conn, 'Use tup_news');

            $query = mysqli_query($conn, "SELECT * FROM news ORDER BY UploadDate DESC;");
            // loop get data
            while ($dbarr = mysqli_fetch_array($query)) {
                $id = $dbarr['id'];
                $topic = $dbarr['topic'];
                $content = $dbarr['content'];
                $UploadDate = $dbarr['UploadDate'];
                $img = $dbarr['img'];
                $category = $dbarr['category'];
            ?>
                <div class="box">
                    <div class="img">
                        <img src="<?php echo $img; ?>">
                    </div>
                    <div class="topic">
                        <h1 class="topic"><?php echo "<a href='show_detail.php?id=" . $id . "'>" . $topic . "</a>" ?></h1>
                    </div>
                    <div class="category-date">
                        <p class="category"><?php echo $category ?></>
                        <p class="date"><?php echo $UploadDate ?></p>
                    </div>
                </div>
            <?php
            } // end loop
            mysqli_close($conn);
            ?>
        </section>
        <section class="right">
            <ul>
                <li><a href="#">กำหนดการ</a></li>
                <li><a href="#">เอกสาร</a></li>
            </ul>
        </section>
    </div>
</body>

</html>