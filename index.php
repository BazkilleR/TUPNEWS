<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="navbar.css">
    <title>Home</title>
</head>

<body>
    <?php require 'header.php'; ?>
    <div class="grid-container">
        <section class="left">
            <?php
            include 'server.php';
            mysqli_query($conn, 'Use tup_news;');
            $query = mysqli_query($conn, "SELECT * FROM news ORDER BY date DESC;");
            // loop
            $count = 0;
            while ($dbarr = mysqli_fetch_array($query)) {
                $topic = $dbarr['topic'];
                $content = $dbarr['content'];
                $date = $dbarr['date'];
                if ($count == 0) { ?>
                    <div class="box" id="first-box">
                        <div class="topic">
                            <h1 class="topic"><?php echo $topic ?></h1>
                        </div>
                        <div class="content">
                            <p class="content"><?php echo $content ?></p>
                        </div>
                        <div class="date">
                            <p class="date"><?php echo $date ?></p>
                        </div>
                        <div class="more">
                            <a href="#">เพิ่มเติม</a>
                        </div>
                    </div>
                <?php $count++;
                } else { ?>
                    <div class="box">
                        <div class="topic">
                            <h1 class="topic"><?php echo $topic ?></h1>
                        </div>
                        <div class="content">
                            <p class="content"><?php echo $content ?></p>
                        </div>
                        <div class="date">
                            <p class="date"><?php echo $date ?></p>
                        </div>
                        <div class="more">
                            <a href="#">เพิ่มเติม</a>
                        </div>
                    </div>
            <?php
                }
            } // end loop
            mysqli_close($conn); ?>
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