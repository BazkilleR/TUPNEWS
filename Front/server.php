<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'tup_news';

// $servername = 'localhost';
// $username = 'u152702107_tup41';
// $password = 'S5+#;b+#d';
// $database = 'u152702107_tup41';

$mysqli = @(new mysqli($servername, $username, $password, $database));

if ($mysqli->connect_error) {
    die($mysqli->connect_error);
}
