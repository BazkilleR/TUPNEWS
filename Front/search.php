<?php
        $output = "";

        if (isset($_POST['input'])) {
            $input = $_POST['input'];

            if (!empty($input)) {

                // connect database
                require('server.php');

                // select data
                $query = "SELECT * FROM news WHERE topic LIKE '%$input%'";
                $result = mysqli_query($conn, $query);

                // output
                $output .= "<h1>RESULT of '" . $input . "'</h1>";

                if (mysqli_num_rows($result) < 1) {
                    $output .= "<p>No Data</p>";
                } else {
                    while ($dbarr = mysqli_fetch_array($result)) {
                        $output .= "<li><a>" . $dbarr['topic'] . "</a>&nbsp-----&nbsp" . $dbarr['UploadDate'] . "</li>";
                    }
                }
            }
        }
    ?>

<?php require('subpage/head.inc.php');?>
<body>
    <?php require('subpage/nav2.inc.php');?>
    <?php require('subpage/search.inc.php');?>
    <?php require('subpage/pagination.inc.php');?>
    <?php require('subpage/footer.inc.php');?>
</body>

</html>