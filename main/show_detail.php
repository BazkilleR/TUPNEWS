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
        $content = nl2br($dbarr['content']);
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
        <p>id : <?=$id?></p> 
        <p>img_path : <?=$img?></p>
        <p>topic : <?=$topic?></p>
        <p>descr : <?=$descr?></p>
        <p>content :<br><?=$content?></p>
        <p>category : <?=$category?></p>
        <p>level : <?=$level?></p>
        <p>UploadDate : <?=$UploadDate?></p>
    </section>
</body>

</html>