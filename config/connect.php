<?php

$connect = mysqli_connect(hostname: 'localhost', username: 'root', password: '', database: 'crud');

if (!$connect) {
    die('Error connect to database!');
}