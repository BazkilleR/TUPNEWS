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
        $content = $dbarr['content'];
        $formattedContent = nl2br($content);
        $category = $dbarr['category'];
        $level = $dbarr['level'];
        $UploadDate = $dbarr['UploadDate'];
    }
} else {
    echo 'can not select data';
}

require('subpage/head.inc.php');
?>

<body class="d-flex flex-column min-vh-100">
    <?php
    require('subpage/nav2.inc.php');
    require('subpage/arti.inc.php');
    require('subpage/footer.inc.php'); 
    ?>
</body>

</html>