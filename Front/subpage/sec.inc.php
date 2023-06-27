<?php
        $output = "";

        if (isset($_POST['input'])) {
            $input = $_POST['input'];

            if (!empty($input)) {

                // connect database
                require('server.php');

                // select data
                $sql = "SELECT * FROM news WHERE topic LIKE '%$input%'";
                $result =$mysqli->query($sql);

                // output
                $output .= "<h1>RESULT of '" . $input . "'</h1>";

                if (mysqli_num_rows($result) < 1) {
                    $output .= "<p>No Data</p>";
                } else {
                    while ($dbarr = $result->fetch_assoc()) {
                        $output .= "<li><a>" . $dbarr['topic'] . "</a>&nbsp-----&nbsp" . $dbarr['UploadDate'] . "</li>";
                    }
                }
            }
        }
    ?>
<div>
    
    <form name="search" method="post">
        <input type="text" placeholder="Search.." name="input">
        <button type="submit"><a href="#"><i class="fa fa-search"></i></a></button>
    </form>
    <ol>
        <?php echo $output; ?>
    </ol>
</div>




<input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </span>