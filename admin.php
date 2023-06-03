<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <?php include 'header.php' ?>
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
                <th style="width: 25%;">DATE</th>
            </tr>
            <?php
                require 'server.php';
                mysqli_query($conn, 'USE tup_news;');
                $query = mysqli_query($conn, 'SELECT * FROM news;');
                while ($dbarr = mysqli_fetch_array($query)) {
                    $id = $dbarr['id'];
                    $topic = $dbarr['topic'];
                    $level = $dbarr['level'];
                    $date = $dbarr['date'];
                    $category = $dbarr['category']; ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><a href="#"><?php echo $topic; ?></a></td>
                        <td><?php echo $category; ?></td>
                        <td><?php echo $level; ?></td>
                        <td><?php echo $date; ?></td>
                    </tr> <?php
                } 
            ?>
        </table>
    </section>

</body>

</html>