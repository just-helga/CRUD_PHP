<?php
    global $connect;
    require_once 'config/connect.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
</head>
<body>
    <style>
        .container {
            margin: 0 auto;
            max-width: 1200px;
        }

        h3 {
            text-align: center;
        }

        .table {
            margin: 40px auto;
        }

        th, td {
            padding: 10px;
        }

        th {
            background-color: black;
            color: #ffffff;
        }

        td {
            background-color: #b4b4b4;
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

        a {
            text-decoration: none;
        }
    </style>

    <div class="container">
        <table class="table">
            <tr>
                <th> ID </th>
                <th> Title </th>
                <th> Description </th>
                <th> Price </th>
                <th>  </th>
                <th>  </th>
                <th>  </th>
            </tr>
            <?php
            $products = mysqli_query($connect, "SELECT * FROM `products`");
            $products = mysqli_fetch_all($products);
            foreach ($products as $product) {
                ?>
                <tr>
                    <td> <?= $product[0] ?> </td>
                    <td> <?= $product[1] ?> </td>
                    <td> <?= $product[2] ?> </td>
                    <td> <?= $product[3] ?> </td>
                    <td style="background: #0081b0"><a style="color: white" href="product.php?id=<?= $product[0] ?>">view</a> </td>
                    <td style="background: #009817"><a style="color: white" href="update.php?id=<?= $product[0] ?>">update</a> </td>
                    <td style="background: #9d0000"><a style="color: white" href="vendor/delete.php?id=<?= $product[0] ?>">delete</a> </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <h3>Add new product</h3>
        <form class="form" action="vendor/create.php" method="post">
            <div class="form__item">
                <label class="form__label" for="title">title</label>
                <input class="form__input" type="text" name="title" id="title" placeholder="title">
            </div>
            <div class="form__item">
                <label class="form__label" for="description">description</label>
                <textarea class="form__input" name="description" id="description" cols="30" rows="10"></textarea>
            </div>
            <div class="form__item">
                <label class="form__label" for="price">price</label>
                <input class="form__input" type="number" name="price" id="price" placeholder="price">
            </div>
            <button class="form__button" type="submit">Add</button>
        </form>
    </div>
</body>
</html>
