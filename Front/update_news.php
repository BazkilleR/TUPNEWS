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

    $output .= "
    <form action='update_news_db.php?id=".$id."' method='post' enctype='multipart/form-data'>
        <p>หัวข้อ</p>
        <input type='text' name='topic' value='" . $dbarr['topic'] . "'><br>
        <p>คำอธิบาย</p>
        <input type='text' name='descr' value='" . $dbarr['descr'] . "'><br>
        <p>เนื้อหา</p>
        <textarea name='content' cols='30' rows='10'>" . $dbarr['content'] . "</textarea><br>
        <label for='level'>สำคัญหรือไม่?</label>
        <input type='radio' name='level' value='1'>
        <label for='yes'>ใช่</label>
        <input type='radio' name='level' checked=true value='0'>
        <label for='no'>ไม่ใช่</label><br>
        <label for='category'>หมวดหมู่</label>
        <select name='category' selected=" . $dbarr['category'] . ">
            <option value='morning'>Morning</option>
            <option value='camp'>Camp</option>
            <option value='tcas67'>TCAS67</option>
            <option value='schedule'>Schedule</option>
        </select><br>
        <label for='img'>อัปโหลดรูปภาพ</label>
        <input type='file' name='img' value='" . $dbarr['img'] . "'><br>
        <input type='submit' name='submit' value='edit'>
    </form>";
}
?>

<?php require('subpage/head.inc.php');?>
<body>
    <?php require('subpage/nav2.inc.php');?>
    <h1>UPDATE</h1>
    <!-- select id -->
    <form action="" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"" method="post">
        <input type="number" name="id" placeholder="select id"><br>
        <input type="submit" value="เลือก">
    </form>
    <br>
    <?php echo $output ?>
</body>

</html>