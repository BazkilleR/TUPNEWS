<?php require('subpage/head.inc.php'); ?>

<html>

<body>
    <?php require('subpage/nav2.inc.php'); ?>
    <h1 class="title">ADMIN PANAL</h1>
    <section class="grid-container">
        <div class="menu">
            <a class="btn btn-primary" href="add_news.php" role="button">Add</a>
            <a class="btn btn-primary" href="delete_news.php" role="button">Delete</a>
            <a class="btn btn-primary" href="update_news.php" role="button">Update</a>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Topic</th>
                    <th scope="col">Category</th>
                    <th scope="col">LV.</th>
                    <th scope="col">UploadDate</th>
                </tr>
            </thead>
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
                    $category = $dbarr['category'];
                    echo <<<HTML
                    <tbody>
                        <tr>
                            <th scope="row">$id</th>
                            <td>$topic</td>
                            <td>$category</td>
                            <td>$level</td>
                            <td>$UploadDate</td>
                        </tr>
                    HTML;
                }
            }
            $mysqli->close();
            ?>
            </tbody>
        </table>
    </section>
</body>

</html>