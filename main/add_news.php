<?php require('subpage/head.inc.php'); ?>
<style>
    input {
        margin-bottom: 1rem;
    }
</style>
<title>addnews</title>

<body>
    <?php require('subpage/nav2.inc.php'); ?>
    <div class="container">
        <form class="shadow p-3 my-3 bg-body-tertiary rounded" action="add_news_db.php" method="post" enctype="multipart/form-data">
            <p class="text-center fs-1">เพิ่มข้อมูล</p>
            <div class="mb-3">
                <label class="form-label">หัวข้อ</label>
                <input type="text" class="form-control" name="topic" placeholder="กรุณาพิมพ์หัวข้อ">
            </div>
            <div class="mb-3">
                <label class="form-label">เนื้อหา</label>
                <textarea class="form-control" name="content" cols="30" rows="10" placeholder="กรุณาพิมพ์เนื้อหา"></textarea>
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
                <select class="form-select" name="category">
                    <option selected>กรุณาเลือกหมวดหมู่</option>
                    <option value="รอบรั้วเตรียมพัฒน์">รอบรั้วเตรียมพัฒน์</option>
                    <option value="แคมป์">แคมป์</option>
                    <option value="TCAS67">TCAS67</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="img">อัปโหลดรูปภาพ</label>
                <input type="file" class="form-control" id="formFile" name="img" value="$img">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-warning" name="submit" value="เพิ่มข้อมูล">
            </div>
        </form>"
    </div>
</body>

</html>