<?php require('subpage/head.inc.php'); ?>

<html>

<body>
    <?php require('subpage/nav2.inc.php'); ?>
    <h1 class="title">ADMIN PANAL</h1>
    <section class="grid-container">
        <div class="menu">
            <ul>
                <li><a href="add_news.php">Add</a></li>
                <li><a href="delete_news.php">Delete</a></li>
                <li><a href="update_news.php">Update</a></li>
            </ul>
        </div>
        <table class="database">
            <tr>
                <th style="width: 5%;">ID</th>
                <th>TOPIC</th>
                <th style="width: 15%;">CATEGORY</th>
                <th style="width: 10%;">LEVEL</th>
                <th style="width: 25%;">UPLOADDATE</th>
            </tr>
            <?php
            require 'server.php';

            $sql = 'SELECT * FROM news';
            $result = $mysqli->query($sql);

            if ($result) {
                while ($dbarr = $result->fetch_assoc()) {
                    $id = $dbarr['id'];
                    $topic = $dbarr['topic'];
                    $level = $dbarr['level'];
                    $UploadDate = $dbarr['UploadDate'];
                    $category = $dbarr['category']; ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><a href="#"><?php echo $topic; ?></a></td>
                        <td><?php echo $category; ?></td>
                        <td><?php echo $level; ?></td>
                        <td><?php echo $UploadDate; ?></td>
                    </tr>
            <?php
                }
            }
            $mysqli->close();
            ?>
        </table>
    </section>
</body>

</html>