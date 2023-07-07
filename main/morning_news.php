<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav2.css">
    <link rel="stylesheet" href="css/lcol.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/morning_news.css">
    <!-- <script src="js/main.js"></script> -->
    <script src="https://kit.fontawesome.com/2a167d09ca.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <title>Home</title>
</head>

<body>
    <div id="flex-container">
        <?php require('subpage/nav2.inc.php'); ?>
        <section>
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-center mt-5">
                    <div>
                        <h1>
                            รอบรั้วเตรียมพัฒน์
                        </h1>
                    </div>
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
                    require 'server.php';
                    require 'pagination-v2.class.php';
                    $page = new PaginationV2();

                    // check if user use date filter
                    if (empty($_POST['date'])) {
                        $sql = "  SELECT * FROM news 
                            WHERE category='รอบรั้วเตรียมพัฒน์' 
                            ORDER BY UploadDate DESC";
                        $result = $page->query($mysqli, $sql, 5);
                    } else {
                        $UploadDate = $_POST['date'];
                        $sql =  " SELECT * FROM news 
                            WHERE category='รอบรั้วเตรียมพัฒน์' 
                            AND UploadDate='$UploadDate'
                            ORDER BY UploadDate DESC";
                        $result = $page->query($mysqli, $sql, 5);
                    }

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
                    ?>
                            <!-- output -->
                            <div class="box">
                                <div class="topic">
                                    <a href="show_detail.php?id=<?php echo $id ?>"><?= $topic ?></a>
                                </div>
                                <div class="category-date">
                                    <p class="date"><?=$buddhistDate?></p>
                                    <p class="category"><?= $category ?></p>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    require('subpage/pagination.inc.php'); //pagination
                    $mysqli->close();
                    echo '</div>';
                    echo '</section>';
                    require('subpage/footer.inc.php'); //footer
                    ?>
                </div>
</body>

</html>