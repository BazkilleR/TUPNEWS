<?php
// connect database
require('server.php');
mysqli_query($conn, 'Use tup_news;');

// get input
$id = $_POST['id'];
$topic = $_POST['topic'];
$descr = $_POST['descr'];
$content = $_POST['content'];
$category = $_POST['category'];
$level = $_POST['level'];

// get img info
$fileName = basename($_FILES['img']['name']);
$fileType = pathinfo($fileName, PATHINFO_EXTENSION);

if (!empty($id)) {
    if (!empty($img)){
        if ($fileType == 'jpg' || $fileType == 'jpeg' || $fileType == 'png') {
            $target_dir = "img/";

            // delete old img file
            unlink()

            // save image file in img dir & delete old file
            
            $fileImg = $target_dir . $fileName; 
            move_uploaded_file($_FILES['img']['tmp_name'], $fileImg);
        }
    }
    
    $query = mysqli_query($conn, "UPDATE news SET topic='$topic', descr='$descr', content='$content', category='$category', level='$level', date=NOW(), img='$img' WHERE id='$id'");

    // check update status
    if ($query) {
        echo 'success<br>';
        echo "<a href='index.php'>HOME</a><br>";
        echo "<a href='admin.php'>ADMIN</a><br>";
    } else {
        echo 'fail';
    }
} else {
    echo 'Please select id.';
}
mysqli_close($conn);
?>