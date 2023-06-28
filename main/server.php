<?php
// $servername = 'localhost';
// $username = 'root';
// $password = '';
// $database = 'tup_news';

$servername = 'localhost';
$username = 'id20892323_tupnews_database';
$password = 'XUUljeGuDimIf1!';
$database = 'id20892323_tup_news';

$mysqli = @(new mysqli($servername, $username, $password, $database));

if ($mysqli->connect_error) {
    die($mysqli->connect_error);
}
