<?php
    $id = $_POST['id'];

    if (!empty($id)) {
        // connect database
        require ('server.php');
        mysqli_query($conn, 'Use tup_news;');

        // delete photo file
        $query = "SELECT img FROM news WHERE id='$id'";
        $del_img = mysqli_query($conn, $query);
        $img_path = mysqli_fetch_array($del_img);
        $del_img = unlink($img_path['img']);
        
        // delete all column
        $query = "DELETE FROM news WHERE id='$id'";
        $result = mysqli_query($conn, $query);
        
        // system check
        if ($del_img && $result) {
            echo 'Delete Successfully.<br>';
            echo "<a href='index.php'>HOME</a><br>";
            echo "<a href='admin.php'>ADMIN</a>";
        } else {
            echo 'fail';
        }
        mysqli_close($conn);
    } else {
        echo 'Please select ID';
        echo "<a href='delete_news.php'>BACK</a>";
    }
?>