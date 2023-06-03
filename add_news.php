<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css">
    <title>Add news</title>
    <style>
        input {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <?php require 'header.php'; ?>
    <form name="add_news" action="add_news_db.php" method="post">
        <!-- topic -->
        <p>หัวข้อ</p>
        <input type="text" name="topic"><br>
        <!-- descr -->
        <p>คำอธิบาย</p>
        <input type="text" name="descr"><br>
        <!-- content -->
        <p>เนื้อหา</p>
        <textarea name="content" cols="30" rows="10"></textarea><br>
        <!-- level -->
        <label for="level">สำคัญหรือไม่?</label>
        <input type="radio" name="level" value="1">
        <label for="yes">ใช่</label>
        <input type="radio" name="level" value="0">
        <label for="no">ไม่ใช่</label><br>
        <!-- category -->
        <label for="category">หมวดหมู่</label>
        <select name="category">
            <option value="morning">Moring</option>
            <option value="camp">Camp</option>
            <option value="tcas67">TCAS67</option>
            <option value="schedule">Schedule</option>
        </select><br>
        <!-- photo -->
        <label for="img">อัปโหลดรูปภาพ</label>
        <input type="file" name="img" accept="image/jpeg. image/jpg, image/png"><br>
        <!-- submit -->
        <input type="submit" name="submit" value="ลงข่าว">
    </form>
</body>
</html>