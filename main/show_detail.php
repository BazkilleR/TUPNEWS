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
        $formattedContent = nl2br($content);
        $category = $dbarr['category'];
        $level = $dbarr['level'];
        $UploadDate = $dbarr['UploadDate'];
    }
} else {
    echo 'can not select data';
}

require('subpage/nav2.inc.php');
require('subpage/head.inc.php');
?>

<body>
    <?php require('subpage/arti.inc.php'); ?>
    <div>
        <?php require('subpage/footer.inc.php'); ?>
    </div>

    <script src="js/newline.js"></script>
</body>

</html>