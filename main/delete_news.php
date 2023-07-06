<?php
$id = $_GET['id'] ?? NULL;
require('subpage/head.inc.php'); 
?>

<body>
    <?php require('subpage/nav2.inc.php'); ?>
    <center>
        <h1>DELETE</h1>
        <form action="delete_news_db.php" method="post">
            <input type="number" name="id" placeholder="กรุณาเลือก ID" value="<?php echo $id?>">
            <input type="submit" value="delete">
        </form>
    </center>
</body>

</html>