<?php
    $id = 0;
    $topic = $_POST['topic'];
    $descr = $_POST['descr'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $level = $_POST['level'];

    include 'server.php';
    $query = mysqli_query($conn, 'Use tup_news;');
    
    $query = mysqli_query($conn, 'SELECT * from news;');
    while ($dbarr = mysqli_fetch_array($query)) {
        $id ++;
    } 
    $query = mysqli_query($conn, "INSERT INTO news VALUES ($id, '$topic', '$descr', '$content', '$category', '$level', NULL);");
    if ($query) {
        echo "success";
        echo "\nBack to <a href='index.php'>HOME</a>";
        echo "\nor add <a href='add_news.php'>MORE</a>";
    } else {
        echo "fail";
    }
    mysqli_close($conn);
?>