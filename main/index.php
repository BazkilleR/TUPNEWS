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
            <div class="news-title">
                <h1>ข่าวสาร</h1>
            </div>
            <div class="news-container">
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
                            <h3><?php echo "<a href='show_detail.php?id=" . $id . "'>" . $topic . "</a>" ?></h3>
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
            </div>
        </section>
        <section class="right">
            <div class="news-title">
                <h1>ข่าวสำคัญ</h1>
            </div>
            <div class="lv1-news-container">
                <div class="box">
                    <div class="img">
                        <img src="https://images.pexels.com/photos/2913125/pexels-photo-2913125.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
                    </div>
                    <div class="content">
                        <div class="topic">
                            <h3>"นิพนธ์" ปชป. เตือน ปม ประชามติแยกดินแดน ขัดรัฐธรรมนูญ หวั่นรุนแรงเพิ่ม</h3>
                        </div>
                        <div class="category-date">
                            <p class="category">Morning</>
                            <p class="date">2023-06-08</p>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="img">
                        <img src="https://images.pexels.com/photos/2913125/pexels-photo-2913125.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
                    </div>
                    <div class="content">
                        <div class="topic">
                            <h3>"นิพนธ์" ปชป. เตือน ปม ประชามติแยกดินแดน ขัดรัฐธรรมนูญ หวั่นรุนแรงเพิ่ม</h3>
                        </div>
                        <div class="category-date">
                            <p class="category">Morning</>
                            <p class="date">2023-06-08</p>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="img">
                        <img src="https://images.pexels.com/photos/2913125/pexels-photo-2913125.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
                    </div>
                    <div class="content">
                        <div class="topic">
                            <h3>"นิพนธ์" ปชป. เตือน ปม ประชามติแยกดินแดน ขัดรัฐธรรมนูญ หวั่นรุนแรงเพิ่ม</h3>
                        </div>
                        <div class="category-date">
                            <p class="category">Morning</>
                            <p class="date">2023-06-08</p>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</body>

</html>