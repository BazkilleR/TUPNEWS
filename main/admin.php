<?php require('subpage/head.inc.php');?>
<body>
    <?php require('subpage/nav2.inc.php');?>
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
                mysqli_query($conn, 'USE tup_news;');
                $query = mysqli_query($conn, 'SELECT * FROM news;');
                while ($dbarr = mysqli_fetch_array($query)) {
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
                    </tr> <?php
                } 
            ?>
        </table>
    </section>

</body>

</html>