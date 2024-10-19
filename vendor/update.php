<?php

require_once "../config/connect.php";

$title = $_POST['title'];
$id = $_POST['id'];
$description = $_POST['description'];
$price = $_POST['price'];

mysqli_query($connect, "UPDATE `products` SET `title` = '$title', `description` = '$description', `price` = '$price' WHERE `products`.`id` = '$id'");

header('Location: ../index.php');