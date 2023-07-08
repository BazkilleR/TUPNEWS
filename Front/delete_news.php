<?php
require('subpage/head.inc.php');
$id = $_GET['id'] ?? NULL;
?>

<body>
    <?php require('subpage/nav2.inc.php'); ?>
    <div class="container">
        <p class="text-center fs-1 mt-3">DELETE</p>
        <form class="shadow p-3 mb-3 bg-body-tertiary rounded" action="delete_news_db.php" method="post">
            <div class="mb-3">
                <label for="number" class="form-label">ID</label>
                <input type="number" class="form-control" name="id" placeholder="กรุณาเลือก ID" value="<?php echo $id ?>">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-danger"  name="submit" value="delete">
            </div>
        </form>
    </div>
</body>

</html>