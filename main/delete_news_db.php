<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    if (!empty($id)) {
        // Connect to the database
        require('server.php');

        // Get the image path and delete the photo file
        $sql = "SELECT img FROM news WHERE id='$id'";
        $result = $mysqli->query($sql);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $img_path = $row['img'];
            $del_img = unlink($img_path);
            
            if ($del_img) {
                // Delete the row
                $sql = "DELETE FROM news WHERE id='$id'";
                $result = $mysqli->query($sql);
                
                if ($result) {
                    // Deletion successful
                    echo 'Delete Successfully.<br>';
                    echo "<a href='index.php'>HOME</a><br>";
                    echo "<a href='admin.php'>ADMIN</a>";
                } else {
                    echo 'Deletion failed.';
                }
            } else {
                echo 'Failed to delete the image file.';
            }
        } else {
            echo 'News item not found.';
        }

        $mysqli->close();
    } else {
        echo 'Please select an ID.';
        echo "<a href='delete_news.php'>BACK</a>";
    }
} else {
    echo 'Invalid request.';
}
