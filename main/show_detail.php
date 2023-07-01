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
?>
<?php require('subpage/nav2.inc.php');?>
<?php require('subpage/head.inc.php');?>
<body>
    <!-- <section class="detail">
        <p class="id">id : <?php echo $id;?></p>
        <p class="img_path">img_path : <?php echo $img;?></p>
        <p class="topic">topic : <?php echo $topic;?></p>
        <p class="descr">descr : <?php echo $descr;?></p>
        <p class="content">content : <?php echo $content;?></p>
        <p class="category">category : <?php echo $category;?></p>
        <p class="level">level : <?php echo $level;?></p>
        <p class="date">UploadDate : <?php echo $UploadDate;?></p>
    </section> -->
    <?php require('subpage/arti.inc.php');?>
    <div>
        <?php require('subpage/footer.inc.php');?>
    </div>
    
    <script src="js/newline.js"></script>
</body>
</html>