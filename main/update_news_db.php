<?php
require('server.php'); // Connect to the database

// Check if id is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Get input values
    $topic = $_POST['topic'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $level = $_POST['level'];

    // Check if image file is uploaded
    if (!empty($_FILES['img']['name'])) {
        $fileType = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);

        // Validate image file type
        $allowedTypes = array('jpg', 'jpeg', 'png');
        if (in_array($fileType, $allowedTypes)) {
            // Delete old image file
            $query = "SELECT img FROM news WHERE id='$id'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $oldImage = $row['img'];
            unlink($oldImage);

            // Save new image file
            $targetDir = "news_img/";
            $fileName = uniqid() . '.' . $fileType;
            $fileImg = $targetDir . $fileName;
            move_uploaded_file($_FILES['img']['tmp_name'], $fileImg);
        } else {
            die('Only JPG, JPEG, and PNG image files are allowed.<br>');
        }
    } else {
        die('You did not upload a photo.<br>');
    }

    // Update data
    $sql =  "UPDATE news SET 
            topic='$topic',
            content='$content',
            category='$category',
            level='$level',
            UploadDate=NOW(),
            img='$fileImg'
            WHERE id='$id'";

    $result = $mysqli->query($sql);
    $mysqli->close();

    // Check update status
    if ($result) {
        echo <<<HTML
            <div class="container-sm text-center p-3 " style="max-width: 700px;">
                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">Update successfully!</h4>
                    <hr>
                    <a class="btn btn-success" href="index.php" role="button">HOME</a>
                    <a class="btn btn-danger" href="admin.php" role="button">ADMIN</a>
                </div>
            </div>
        HTML;
    } else {
        echo 'Update failed';
    }
} else {
    echo 'Please select an id.';
}
