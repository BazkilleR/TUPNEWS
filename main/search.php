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
                        $output .= "<li><a>" . $dbarr['topic'] . "</a>&nbsp-----&nbsp" . $dbarr['date'] . "</li>";
                    }
                }
            }
        }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Search</title>
</head>

<body>
    <?php require('header.php'); ?>
    <form name="search" method="post">
        <input type="text" placeholder="Search.." name="input">
        <button type="submit"><a href="#"><i class="fa fa-search"></i></a></button>
    </form>
    <ol>
        <?php echo $output; ?>
    </ol>
</body>

</html>