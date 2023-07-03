<?php require('subpage/head.inc.php'); ?>
<style>
    input {
        margin-bottom: 1rem;
    }
</style>
<title>addnews</title>

<body>
    <?php require('subpage/nav2.inc.php'); ?>
    <form id="add-data-form" action="add_news_db.php" method="post" enctype="multipart/form-data">
        <h1 class="text-center" id="header-text">เพิ่มข้อมูล</h1>
        <!-- topic -->
        <div class="form-group">
            <label for="topic">หัวข้อ</label>
            <input type="text" class="form-control" name="topic" placeholder="ชื่อหัวข้อ">
        </div>
        <!-- descr -->
        <div class="form-group">
            <label for="decsr">คำอธิบาย</label>
            <textarea class="form-control" rows="3" name="descr" placeholder="กรอกคำอธิบาย"></textarea>
        </div>
        <!-- content -->
        <div class="form-group">
            <label for="content">เนื้อหา</label>
            <textarea class="form-control" rows="10" name="content" placeholder="กรอกเนื้อหา"></textarea>
        </div>
        <!-- level -->
        <div class="form-group">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" name="level" class="custom-control-input">
                <label class="custom-control-label" for="radio1" value="1">สำคัญ</label>
                <input type="radio" name="level" class="custom-control-input">
                <label class="custom-control-label" for="radio2" value="0">ไม่สำคัญ</label>
            </div>
        </div>
        <!-- category -->
        <div class="form-group">
            <label class="my-1 mr-2" for="category">หมวดหมู่</label>
            <select class="custom-select my-1 mr-sm-2" name="category">
                <option selected>เลือกหมวดหมู่</option>
                <option value="morning">Moring</option>
                <option value="camp">Camp</option>
                <option value="tcas67">TCAS67</option>
                <option value="schedule">Schedule</option>
            </select>
        </div>
        <!-- img -->
        <div class="form-group">
            <label for="img">อัปโหลดรูปภาพ</label>
            <input type="file" class="form-control-file" name="img">
        </div>
        <!-- submit -->
        <input class="btn btn-primary" type="submit" value="เพิ่มข้อมูล" name="submit">
    </form>
</body>

</html>