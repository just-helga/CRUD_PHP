<?php
global $connect;
require_once 'config/connect.php';

$product_id = $_GET['id'];
$product = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$product_id'");
$product = mysqli_fetch_assoc($product);

$comments = mysqli_query($connect, "SELECT * FROM `comments` WHERE `product_id` = '$product_id'");
$comments = mysqli_fetch_all($comments);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update product</title>
</head>
<body>
<style>
    .container {
        margin: 0 auto;
        max-width: 1200px;
    }

    h3 {
        margin-top: 40px;
        text-align: center;
    }

    .product {
        display: flex;
        flex-direction: column;
        align-items: start;
        justify-content: start;
    }

    form {
        width: 45%;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-content: start;
        justify-content: start;
    }

    .form__item {
        display: flex;
        flex-direction: column;
        align-content: start;
        justify-content: start;
        margin-bottom: 10px;
    }

    .form__label {
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form__input {
        width: 100%;
        border: #b4b4b4 1px solid;
        padding: 10px;
        border-radius: 0%;
    }

    textarea.form__input {
        max-width: 100%;
        min-width: 100%;
        max-height: 100px;
    }

    .form__button {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
        width: 50%;
        margin-top: 10px;
        cursor: pointer;
        background: #b4b4b4;
        border: black 2px solid;
        transition: .3s linear;
    }

    .form__button:hover {
        border: #b4b4b4 2px solid;
        background-color: black;
        color: #ffffff;
    }

    .comments {
        margin-top: 40px;
    }
</style>

<div class="container">
    <div class="product">
        <h2> <?= $product['title'] ?> </h2>
        <p> <?= $product['description'] ?> </p>
        <p> <?= $product['price'] ?> </p>
    </div>
    <h3>Add comment</h3>
    <form class="form" action="vendor/comment/create.php" method="post">
        <div class="form__item">
            <input class="form__input" type="hidden" name="product_id" id="product_id" placeholder="product_id" value="<?= $product['id'] ?>">
        </div>
        <div class="form__item">
            <label class="form__label" for="body">body</label>
            <textarea class="form__input" name="body" id="body" cols="30" rows="10"></textarea>
        </div>
        <button class="form__button" type="submit">Update</button>
    </form>
    <ul class="comments">
        <?php
            foreach ($comments as $comment) {
        ?>
                <li> <?= $comment[2] ?> </li>
        <?php
            }
        ?>
    </ul>
</div>
</body>
</html>
