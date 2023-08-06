<?php require('subpage/head.inc.php'); ?>

<?php
// Connect to the database
require('server.php');

// Check if all input fields are set
$requiredFields = ['topic', 'content', 'category', 'level'];
$isValidInput = true;

foreach ($requiredFields as $field) {
    if (!isset($_POST[$field])) {
        $isValidInput = false;
        break;
    }
}

if ($isValidInput) {
    $topic = $_POST['topic'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $level = $_POST['level'];

    // Check if the image file is set
    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $fileName = $_FILES['img']['name'];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Check if the file type is allowed
        $allowedTypes = ['jpg', 'jpeg', 'png'];
        if (in_array($fileType, $allowedTypes)) {
            // Save the image file
            $targetDir = 'news_img/';
            $fileImg = $targetDir . $fileName;
            $fileTemp = $_FILES['img']['tmp_name'];

            if (move_uploaded_file($fileTemp, $fileImg)) {
                // Insert data into the database using prepared statements
                $query = "INSERT INTO news (topic, content, category, level, UploadDate, img) VALUES (?, ?, ?, ?, NOW(), ?)";
                $stmt = mysqli_prepare($mysqli, $query);
                mysqli_stmt_bind_param($stmt, 'sssss', $topic, $content, $category, $level, $fileImg);
                $result = mysqli_stmt_execute($stmt);

                if ($result) {
                    echo <<<HTML
                        <div class="container-sm text-center p-3 " style="max-width: 700px;">
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">Add successfully!</h4>
                                <hr>
                                <a class="btn btn-success" href="index.php" role="button">HOME</a>
                                <a class="btn btn-danger" href="admin.php" role="button">ADMIN</a>
                            </div>
                        </div>
                    HTML;
                } else {
                    echo 'Add data failure';
                }
            } else {
                echo 'Failed to move uploaded file.';
            }
        } else {
            echo 'Sorry, only JPG, JPEG & PNG files are allowed.';
        }
    } else {
        echo 'Please select an image file.';
    }
} else {
    echo 'Please fill in all input fields.';
}

// Disconnect from the database
$mysqli->close();
