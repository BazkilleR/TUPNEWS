<?php require('subpage/head.inc.php'); ?>

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
                    echo <<<HTML
                        <div class="container-sm text-center p-3 " style="max-width: 700px;">
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Delete successfully!</h4>
                                <hr>
                                <a class="btn btn-success" href="index.php" role="button">HOME</a>
                                <a class="btn btn-danger" href="admin.php" role="button">ADMIN</a>
                            </div>
                        </div>
                    HTML;
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
