<?php
// connect database
require('server.php');
mysqli_query($conn, 'Use tup_news;');

if (isset($_GET['id'])) { // check id input

    // get input
    $id = $_GET['id'];
    $topic = $_POST['topic'];
    $descr = $_POST['descr'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $level = $_POST['level'];

    // get img info
    $fileName = basename($_FILES['img']['name']);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

    if (!empty($fileName)) { // check img input
        if ($fileType == 'jpg' || $fileType == 'jpeg' || $fileType == 'png') { // check img extension

            // delete old img file
            $query = "SELECT img FROM news WHERE id='$id'";
            $del_img = mysqli_query($conn, $query);
            $img_path = mysqli_fetch_array($del_img);
            echo $img_path['img'] . "<br>";
            $del_img = unlink($img_path['img']);

            // save image file in img dir
            $target_dir = "img/";
            $fileImg = $target_dir . $fileName;
            move_uploaded_file($_FILES['img']['tmp_name'], $fileImg);
        } else {
            echo 'only allow jpg jpeg png<br>';
        }
    } else {
        echo 'You do not upload photo.<br>';
    }

    $target_dir = "img/";
    $fileImg = $target_dir . $fileName;
    echo $fileImg . "<br>";

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