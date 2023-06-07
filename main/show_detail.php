<?php
// connect sdatabase
require 'server.php';

// get id from url
$id = $_GET['id']; 

// select data
$query = "SELECT * FROM news WHERE id='$id'";
$result = mysqli_query($conn, $query);
if ($result) {
    while ($dbarr = mysqli_fetch_array($result)) {
        $id = $dbarr['id'];
        $img = $dbarr['img'];
        $topic = $dbarr['topic'];
        $descr = $dbarr['descr'];
        $content = $dbarr['content'];
        $category = $dbarr['category'];
        $level = $dbarr['level'];
        $date = $dbarr['date'];
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
        <p class="id">id : <?php echo $id;?></p>
        <p class="img_path">img_path : <?php echo $img;?></p>
        <p class="topic">topic : <?php echo $topic;?></p>
        <p class="descr">descr : <?php echo $descr;?></p>
        <p class="content">content : <?php echo $content;?></p>
        <p class="category">category : <?php echo $category;?></p>
        <p class="level">level : <?php echo $level;?></p>
        <p class="date">date : <?php echo $date;?></p>
    </section>
</body>
</html>