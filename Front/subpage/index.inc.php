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
            <div>
                <h1>กำหนดการต่างๆ</h1>
            </div>
        </section>
</div>