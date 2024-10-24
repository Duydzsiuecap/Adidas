<?php
$mysqli = new mysqli("localhost","root","","web_mysqli");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>