<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "dbapplestore";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function query($query){
        return $this->conn->query($query);
    }
}

$db = new Database();

function query($query){
    global $db;
    $result = $db->query($query);
    $rows = [];
    while($row = $result->fetch_assoc()){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $db;

    $code = htmlspecialchars($data["code"]);
    $product_name = htmlspecialchars($data["product_name"]);
    $product_type = htmlspecialchars($data["product_type"]);
    $price = htmlspecialchars($data["price"]);

    $image = upload();
    if (!$image) {
        return false;
    }

    $query = "INSERT INTO appleproduct VALUES ('', '$product_name', '$product_type', '$code', '$price', '$image')";

    $db->query($query);

    return $db->conn->affected_rows;
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

    return $namaFileBaru;
}

function edit($data)
{
    global $db;

    $id = $data["id"];

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

    $db->query($query);

    return $db->conn->affected_rows;
}


function hapus($id)
{
    global $db;

    $db->query("DELETE FROM appleproduct WHERE id=$id");

    return $db->conn->affected_rows;
}


function search($keyword){
    $query = "SELECT * FROM appleproduct WHERE
    product_name LIKE '%$keyword%' OR 
    product_type LIKE '%$keyword%' OR
    code LIKE '%$keyword%'
    ";

    return query($query);
}
?>
