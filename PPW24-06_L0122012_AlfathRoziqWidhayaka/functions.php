<?php
$conn = mysqli_connect("localhost", "root", "", "dbapplestore"); // Menghubungkan ke database menggunakan mysqli_connect()

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query); // Menjalankan query pada database
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;

    // Mengambil nilai dari form tambah dan membersihkannya dari karakter khusus menggunakan htmlspecialchars()
    $code = htmlspecialchars($data["code"]);
    $product_name = htmlspecialchars($data["product_name"]);
    $product_type = htmlspecialchars($data["product_type"]);
    $price = htmlspecialchars($data["price"]);

    $image = upload();
    if (!$image) {
        return false;
    }

    $query = "INSERT INTO appleproduct VALUES ('', '$product_name', '$product_type', '$code', '$price', '$image')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    // Mendapatkan informasi file yang diupload
    $namaFile = $_FILES['image']['name'];
    $ukuranFile = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    if ($error === 4) {
        echo "<script>alert('Select Image');</script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('File doesn't match');</script>";
        return false;
    }

    // Memeriksa ukuran file gambar yang diupload
    if ($ukuranFile > 1000000) {
        echo "<script>alert('Size is too big!');</script>";
        return false;
    }

    $namaFileBaru = uniqid() . '.' . $ekstensiGambar;

    move_uploaded_file($tmpName, 'images/' . $namaFileBaru);

    return $namaFileBaru; // Mengembalikan nama file gambar baru
}

function edit($data)
{
    global $conn;
    $id = $data["id"];

    // Mengambil nilai dari form edit dan membersihkannya dari karakter khusus menggunakan htmlspecialchars()
    $code = htmlspecialchars($data["code"]);
    $product_name = htmlspecialchars($data["product_name"]);
    $product_type = htmlspecialchars($data["product_type"]);
    $price = htmlspecialchars($data["price"]);

    $gambarAwal = $data["gambarAwal"];

    if ($_FILES['image']['error'] === 4) {
        $image = $gambarAwal;
    } else {
        $image = upload();
    }

    $query = "UPDATE appleproduct SET
        code='$code',
        product_name='$product_name',
        product_type='$product_type',
        price = '$price',
        image='$image'
        WHERE id=$id
        ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM appleproduct WHERE id=$id");

    return mysqli_affected_rows($conn);
}

function search($keyword){
    // Membuat query SQL untuk mencari data berdasarkan kata kunci yang dimasukkan
    $query = "SELECT * FROM appleproduct WHERE
    product_name LIKE '%$keyword%' OR 
    product_type LIKE '%$keyword%' OR
    code LIKE '%$keyword%'
    ";

    return query($query); // Menjalankan fungsi query() dengan parameter query yang sudah dibuat
}
?>
