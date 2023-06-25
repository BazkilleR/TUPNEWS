<?php
// connect sdatabase
require 'server.php';

// get id from url
$id = $_GET['id']; 

// select data
$sql = "SELECT * FROM news WHERE id='$id'";
$result = $mysqli->query($sql);
if ($result) {
    while ($dbarr = $result->fetch_assoc()) {
        $id = $dbarr['id'];
        $img = $dbarr['img'];
        $topic = $dbarr['topic'];
        $descr = $dbarr['descr'];
        $content = $dbarr['content'];
        $category = $dbarr['category'];
        $level = $dbarr['level'];
        $UploadDate = $dbarr['UploadDate'];
    }
} else {
    echo 'can not select data';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section class="detail">
        <p class="id">id : <?= $id ?></p>
        <p class="img_path">img_path : <?= $img ?></p>
        <p class="topic">topic : <?= $topic ?></p>
        <p class="descr">descr : <?= $descr ?></p>
        <p class="content">content : <?= $content ?></p>
        <p class="category">category : <?= $category ?></p>
        <p class="level">level : <?= $level ?></p>
        <p class="date">UploadDate : <?= $UploadDate ?></p>
    </section>
</body>
</html>