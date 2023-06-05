<?php
    $id = $_POST['id'];
    $topic = $_POST['topic'];
    $descr = $_POST['descr'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $level = $_POST['level'];

    require ('server.php');
    mysqli_query($conn, 'Use tup_news;');
    $query = mysqli_query($conn, "UPDATE news SET topic='$topic', descr='$descr', content='$content', category='$category', level='$level', date=NULL WHERE id='$id';");
    if ($query) {
        echo 'success<br>';
        echo "<a href='index.php'>HOME</a><br>";
        echo "<a href='admin.php'>ADMIN</a><br>";
    } else {
        echo 'fail';
    }
    mysqli_close($conn);
?>