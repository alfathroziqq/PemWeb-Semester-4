<?php
require 'functions.php'; 
$appleproduct = query('SELECT * FROM appleproduct'); 

// Jika tombol pencarian diklik, maka data produk akan difilter berdasarkan kata kunci yang dimasukkan menggunakan fungsi search di functions.php
if(isset($_POST["search"])){
    $appleproduct = search($_POST["keyword"]); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple Store</title>
    <link rel="icon" href="apple.png" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #2c2c2c; 
        }

        .container {
            max-width: 80%;
            margin: 70px auto;
            padding: 50px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        }

        h1 {
            text-align: center;
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 50px;
        }

        .search-container {
            margin: 0 auto;
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            max-width: 600px;
        }

        .search-container form {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search-container input[type="text"] {
            flex: 1;
            padding: 8px;
            border: 2px solid #2c2c2c;
            border-radius: 5px;
            font-size: 16px;
            margin-right: 5px;
        }

        .search-container button[type="submit"] {
            padding: 8px 20px;
            background-color: #2c2c2c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
        }

        .search-container:hover button[type="submit"] {
            background-color: #6a6a6a;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd; 
        }

        th {
            background-color: #2c2c2c;
            color: white;
        }

        .button {
            display: block;
            width: 150px;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4341ff; 
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #625dff; 
        }

        .edit-button {
            display: inline-block;
            padding: 8px 16px;
            background-color: #ff8c00;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            font-size: 14px;
        }

        .delete-button {
            display: inline-block;
            padding: 8px 16px;
            background-color: #dc143c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            font-size: 14px;
        }

        .edit-button:hover {
            background-color: #ffa500; 
        }

        .delete-button:hover {
            background-color: #ff0000;
        }

        img {
            display: block;
            margin: 0 auto;
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Apple Product</h1>
        <div class="search-container">
            <form action="" method="post">
                <input type="text" name="keyword" size="20" autofocus placeholder="Masukkan kata kunci" autocomplete="off">
                <button type="submit" name="search">Cari</button>
            </form>
        </div>
        <table border="1" cellpadding="10">
            <tr> 
                <th>No.</th>
                <th>Code</th>
                <th>Product</th>
                <th>Type</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach($appleproduct as $row) : ?>
            <tr>
                <td><?= $i++; ?></td>

                <td><?= $row['code']; ?></td>
                <td><?= $row['product_name']; ?></td>
                <td><?= $row['product_type']; ?></td>
                <td>Rp. <?= $row['price']; ?></td>
                <td>
                    <img src="images/<?= $row['image']; ?>" alt="none">
                </td>
                <td>
                    <a href="edit.php?id=<?= $row["id"]; ?>" class="edit-button">Edit</a>
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Are you sure to delete?');" class="delete-button">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <a href="tambah.php" class="button">Add Product</a>
    </div>
</body>
</html>
