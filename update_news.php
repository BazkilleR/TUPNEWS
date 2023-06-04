<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Update</title>
</head>

<body>
    <?php require 'header.php' ?>
    <h1>UPDATE</h1>
    <form action="update_news_db.php" method="post">
        <!-- select id -->
        <input type="number" name="id" placeholder="select id"><br>
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
        <input type="submit" name="submit" value="edit">
    </form>
</body>

</html>