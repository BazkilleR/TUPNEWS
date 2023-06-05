<?php
    require 'server.php';
    mysqli_query($conn, "USE tup_news"); 

    // get input
    $topic = $_POST['topic'];
    $descr = $_POST['descr'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $level = $_POST['level'];

    // get img info
    $fileName = basename($_FILES['img']['name']); 
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 

    if (!empty($topic) || !empty($descr) || !empty($content) || !empty($category) || !empty($level) || !empty($fileName)) {
        // check img type
        if ($fileType == 'jpg' || $fileType == 'jpeg' || $fileType == 'png') {
            // save image file in img dir
            $target_dir = "img/";
            $fileImg = $target_dir . $fileName; 
            move_uploaded_file($_FILES['img']['tmp_name'], $fileImg);

            // add input to database
            $query = "INSERT INTO news (id,topic,descr,content,category,level,date,img) VALUES (NULL,'$topic','$topic','$descr','$content','$level',NULL,'$fileImg')";
            $result = mysqli_query($conn, $query);
            
            if ($result) {
                echo 'Add data successfully';
            } else {
                echo 'add data failure';
            }
        } else {
            echo "Sorry, only JPG, JPEG & PNG files are allowed.";
        }
    } else {
        echo "Please type all input";
    }
?>