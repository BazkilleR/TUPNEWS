<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="morning_news.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home</title>
</head>

<body>
    <?php require('header.php'); ?>
    <div class="header-text">
        <h1>ข่าวตอนเช้า</h1>
    </div>
    <div class="date-filter">
            <input type="date" name="date">
        </div>
    <div class="flex-container">
        <?php
        include 'server.php';
        mysqli_query($conn, 'Use tup_news;');

        $query = mysqli_query($conn, "SELECT * FROM news WHERE category='morning' ORDER BY date DESC;");

        // get data
        while ($dbarr = mysqli_fetch_array($query)) {
            $topic = $dbarr['topic'];
            $descr = $dbarr['descr'];
            $category = $dbarr['category'];
            $date = $dbarr['date'];
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
                        <p><?php echo $date ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- end loop -->
        <?php
        } 
        mysqli_close($conn);
        ?>
    </div>
</body>

</html>