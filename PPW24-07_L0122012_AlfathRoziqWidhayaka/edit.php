<?php 
require 'functions.php';

$id = $_GET["id"];

$appleproduct = query("SELECT * FROM appleproduct WHERE id=$id")[0];

$errors = array();

if(isset($_POST["submit"])){
    // Validasi input sebelum melakukan pengeditan
    if(empty($_POST['code'])) {
        $errors[] = 'Harap isi bidang ini.';
    }
    if(empty($_POST['product_name'])) {
        $errors[] = 'Harap isi bidang ini.';
    }
    if(empty($_POST['product_type'])) {
        $errors[] = 'Harap isi bidang ini.';
    }
    if(empty($_POST['price'])) {
        $errors[] = 'Harap isi bidang ini.';
    }
    if(empty($errors)) {
        if(edit($_POST) > 0){
            echo "<script>
            alert('Success to edit data!'); 
            </script>";
        } else{
            echo "<script>
            alert('Failed to edit data!'); 
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="icon" href="apple.png" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,700&display=swap">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #2c2c2c; 
        }

        .container {
            max-width: 28.69%;
            margin: 10px auto;
            padding: 10px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        }

        h1 {
            text-align: center;
            color: #ffffff; 
            margin-top: 30px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        }

        label {
            color: #2c2c2c; 
            font-weight: bold;
        }

        input[type="text"], input[type="file"] {
            width: 135%;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #2c2c2c; 
        }

        input[type="file"] {
            border: none; 
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4341ff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4341ff; 
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #625dff;
        }

        img {
            display: block;
            margin: 10px auto;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); 
        }

    </style>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $appleproduct["id"]; ?>">
        <input type="hidden" name="gambarAwal" value="<?= $appleproduct["image"]; ?>">
        <table>
            <tr>
                <td>
                    <label for="code">Code</label>
                    <input type="text" name="code" placeholder="Input the product code" id="code" value="<?= $appleproduct["code"]?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="product_name">Product</label>
                    <input type="text" name="product_name" placeholder="Input the product name" id="product_name" value="<?= $appleproduct["product_name"]?>" required>
                </td>  
            </tr>
            <tr>
                <td>
                    <label for="product_type">Type</label>
                    <input type="text" name="product_type" placeholder="Input the product type" id="product_type" value="<?= $appleproduct["product_type"]?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="price">Price</label>
                    <input type="text" name="price" placeholder="Input the product price" id="price" value="<?= $appleproduct["price"]?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="image">Image</label><br>
                    <img src="images/<?= $appleproduct['image']; ?>" alt="none" width="80px" height="60px"><br>
                    <input type="file" name="image" id="image" required>
                </td>
            </tr>
        </table>
        <button type="submit" name="submit">Submit</button>
    </form>
    <div class="container">
        <a href="index.php"><button>Go Back</button></a>
    </div>
</body>
</html>
