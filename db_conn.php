<?php
// $host = "localhost";
// $username = "root";
// $password = "";
// $db_name = "dotoday_db";

$host = "db4free.net";
$username = "zainahmed";
$password = "4648790zain!";
$db_name = "dotoday_db";

$conn = mysqli_connect($host, $username, $password, $db_name);

if (!$conn) {
    die("Error: " . mysqli_connect_error());
}
