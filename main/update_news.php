<?php
// connect database
require 'server.php';

$output = '';

// check if user doesnt type id
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "SELECT * FROM news where id='$id'";
    $result = $mysqli->query($sql);
    $dbarr = $result->fetch_assoc();

    $topic = $dbarr['topic'];
    $content = $dbarr['content'];
    $level = $dbarr['level'];
    $category = $dbarr['category'];
    $img = $dbarr['img'];

    $output .= <<<HTML
    <form class="shadow p-3 mb-3 bg-body-tertiary rounded" action="update_news_db.php?id=$id" method="post" enctype="multipart/form-data">
    <p class="text-center fs-2">ข้อมูล (ID=$id)</p>
        <div class="mb-3">
            <label class="form-label">หัวข้อ</label>
            <input type="text" class="form-control" name="topic" value="$topic">
        </div>
        <div class="mb-3">
            <label class="form-label">เนื้อหา</label>
            <textarea class="form-control" name="content" cols="30" rows="10">$content</textarea>
        </div>
        <div class="mb-3">
            <label class="form-check-label" for="level">สำคัญหรือไม่?</label>
            <input type="radio" class="form-check-input" name="level" value="1">
            <label class="form-check-label" for="yes">ใช่</label>
            <input type="radio" class="form-check-input" name="level" checked=true value="0">
            <label class="form-check-label" for="no">ไม่ใช่</label>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">หมวดหมู่</label>
            <select class="form-select" name="category" selected="$category">
                <option selected>กรุณาเลือกหมวดหมู่</option>
                <option value="รอบรั้วเตรียมพัฒน์">รอบรั้วเตรียมพัฒน์</option>
                <option value="TCAS67">TCAS67</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="img">อัปโหลดรูปภาพ</label>
            <input type="file" class="form-control" id="formFile" name="img" value="$img">
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-warning" name="submit" value="แก้ไข">
        </div>
    </form>"
    HTML;
}

$id = $_GET['id'] ?? NULL;
require('subpage/head.inc.php');
?>

<body>
    <?php require('subpage/nav2.inc.php'); ?>
    <div class="container">
    <p class="text-center fs-1 mt-3">แก้ไขข้อมูล</p>
        <form method="post" class="shadow p-3 my-3 bg-body-tertiary rounded">
        <p class="text-center fs-2">เลือก ID</p>
            <div class="mb-3">
                <label for="number" class="form-label">ID</label>
                <input type="number" class="form-control" name="id" placeholder="กรุณาเลือก ID" value="<?php echo $id ?>">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-warning" value="เลือก">
            </div>
        </form>
        <?= $output ?>
    </div>
</body>

</html>