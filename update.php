<?php
    global $connect;
    require_once 'config/connect.php';

    $product_id = $_GET['id'];
    $product = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$product_id'");
    $product = mysqli_fetch_assoc($product);
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
</style>

<div class="container">
    <h3>Update product</h3>
    <form class="form" action="vendor/update.php" method="post">
        <div class="form__item">
            <label class="form__label" for="id">id</label>
            <input class="form__input" type="hidden" name="id" id="id" placeholder="title" value="<?= $product['id'] ?>">
        </div>
        <div class="form__item">
            <label class="form__label" for="title">title</label>
            <input class="form__input" type="text" name="title" id="title" placeholder="title" value="<?= $product['title'] ?>">
        </div>
        <div class="form__item">
            <label class="form__label" for="description">description</label>
            <textarea class="form__input" name="description" id="description" cols="30" rows="10"><?= $product['description'] ?></textarea>
        </div>
        <div class="form__item">
            <label class="form__label" for="price">price</label>
            <input class="form__input" type="number" name="price" id="price" placeholder="price" value="<?= $product['price'] ?>">
        </div>
        <button class="form__button" type="submit">Update</button>
    </form>
</div>
</body>
</html>
