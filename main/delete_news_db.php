<?php
    $id = $_POST['id'];

    require ('server.php');
    mysqli_query($conn, 'Use tup_news;');
    $query = mysqli_query($conn, "DELETE FROM news WHERE id='$id'");
    if ($query) {
        echo 'success<br>';
        echo "<a href='index.php'>HOME</a><br>";
        echo "<a href='admin.php'>ADMIN</a>";
    } else {
        echo 'fail';
    }
    mysqli_close($conn);
?>