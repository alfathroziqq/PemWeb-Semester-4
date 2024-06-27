<?php 

require 'functions.php';

// Memanggil fungsi tambah dari file functions.php dengan parameter data dari $_POST, jika nilai kembalian lebih dari 0, artinya data berhasil ditambahkan
if(isset($_POST["submit"])){ 
    if (tambah($_POST) > 0) { 
        echo "<script>
        alert('Success to Add Product!'); 
        </script>";
    } else {
            echo "<script>
            alert('Failed to Add Product!'); 
            </script>";
    }     
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
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

        
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #2c2c2c;
        }

        h1 {
            text-align: center;
            color: #ffffff;
            margin-top: 30px;
        }

        label {
            color: #2c2c2c;
            font-weight: bold;
        }

        input[type="text"],
        input[type="file"] {
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
            font-family: 'Poppins', sans-serif;
        }

        button:hover, button[type="submit"]:hover {
            background-color: #625dff;
        }

    </style>
</head>
<body>
    <h1>Add Apple Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <label for="code">Code</label>
                    <input type="text" name="code" id="code" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="product_name">Product</label>
                    <input type="text" name="product_name" id="product_name" required>
                </td>  
            </tr>
            <tr>
                <td>
                    <label for="product_type">Type</label>
                    <input type="text" name="product_type" id="product_type" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="price">Price</label>
                    <input type="text" name="price" id="price" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="image">Image</label><br>
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
