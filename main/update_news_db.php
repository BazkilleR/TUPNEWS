<?php
// connect database
require('server.php');
mysqli_query($conn, 'Use tup_news;');

// get input
$id = $_GET['id'];
$topic = $_POST['topic'] ?? NULL;
$descr = $_POST['descr'] ?? NULL;
$content = $_POST['content'] ?? NULL;
$category = $_POST['category'] ?? NULL;
$level = $_POST['level'] ?? NULL;

// get img info
$fileName = basename($_FILES['img']['name']) ?? NULL;
$fileType = pathinfo($fileName, PATHINFO_EXTENSION);

if (!empty($id)) { // check id input
    if (!empty($img)) { // check img input
        if ($fileType == 'jpg' || $fileType == 'jpeg' || $fileType == 'png') { // check img extension

            // delete old img file
            $query = "SELECT img FROM news WHERE id='$id'";
            $del_img = mysqli_query($conn, $query);
            $img_path = mysqli_fetch_array($del_img);
            $del_img = unlink($img_path['img']);

            // save image file in img dir
            $target_dir = "img/";
            $fileImg = $target_dir . $fileName;
            move_uploaded_file($_FILES['img']['tmp_name'], $fileImg);
        }
    }

    $target_dir = "img/";
    $fileImg = $target_dir . $fileName;

    // update data
    $query =    "UPDATE news SET 
                topic='$topic' ,
                descr='$descr' ,
                content='$content' ,
                category='$category' ,
                level='$level' ,
                date=NOW() ,
                img='$fileImg'
                WHERE id='$id' ";

    $result = mysqli_query($conn, $query);
    mysqli_close($conn);

    // check update status
    if ($result) {
        echo 'Upadate successfully<br>';
        echo "<a href='index.php'>HOME</a><br>";
        echo "<a href='admin.php'>ADMIN</a><br>";
    } else {
        echo 'Upload fail';
    }
} else {
    echo 'Please select id';
}
?>