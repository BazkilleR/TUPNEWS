<?php require('subpage/head.inc.php'); ?>

<html>

<body>
    <?php require('subpage/nav2.inc.php'); ?>
    <section>
        <div class="container">
            <p class="fs-1 text-center mt-3">ADMIN PANAL</p>
            <div class="btn-group" role="group">
                <a class="btn btn-success" href="add_news.php" role="button">Add</a>
                <a class="btn btn-warning" href="update_news.php" role="button">Update</a>
                <a class="btn btn-danger" href="delete_news.php" role="button">Delete</a>
            </div>
            <div class="table-responsive mt-3 mb-3">
                <table id="example" class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Topic</th>
                            <th scope="col">Category</th>
                            <th scope="col">LV.</th>
                            <th scope="col">Date</th>
                            <th scope="col">Img</th>
                            <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'server.php';

                        $sql = 'SELECT * FROM news ORDER BY UploadDate DESC';
                        $result = $mysqli->query($sql);

                        if ($result) {
                            while ($dbarr = $result->fetch_assoc()) {
                                $id = $dbarr['id'];
                                $topic = $dbarr['topic'];
                                $level = $dbarr['level'];
                                $UploadDate = $dbarr['UploadDate'];
                                $category = $dbarr['category'];
                                $img = $dbarr['img'];
                                echo <<<HTML
                                <tr>
                                    <th scope="row">$id</th>
                                    <td>$topic</td>
                                    <td>$category</td>
                                    <td>$level</td>
                                    <td>$UploadDate</td>
                                    <td><img src='$img' style='max-width: 5rem; max-height: 5rem'></td>
                                    <td id='option'>
                                        <a class="btn btn-primary btn-warning" href="update_news.php?id=$id" role="button">Update</a>
                                        <a class="btn btn-primary btn-danger" href="delete_news.php?id=$id" role="button">Delete</a>
                                    </td>
                                </tr>
                            HTML;
                            }
                        }
                        $mysqli->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>

</html>