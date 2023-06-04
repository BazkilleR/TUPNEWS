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
    <?php require 'header.php'; ?>
    <section class="flex-container">
        <table>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </table>
        <div class="left">
            <img src="img/5ddfea42-7377-4bef-9ac4-f3bd407d52ab_landing-photo-to-cartoon-img5.avif" alt="">
        </div>
        <div class="right">
            <?php
                include 'server.php';
                mysqli_query($conn, 'Use tup_news;');

                $query = mysqli_query($conn, "SELECT * FROM news WHERE category='morning' ORDER BY date DESC;");
                // loop
                $count = 0;
                while ($dbarr = mysqli_fetch_array($query)) {
                    $topic = $dbarr['topic'];
                    $content = $dbarr['content'];
                    $date = $dbarr['date']; ?>
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
                    </div> <?php
                } // end loop
                mysqli_close($conn);
            ?>
        </div>
    </section>
</body>

</html>