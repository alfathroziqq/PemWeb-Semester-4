<?php 

require 'functions.php';

// Mendapatkan ID dari URL
$id = $_GET["id"];

// Memanggil fungsi hapus dari file functions.php dengan parameter ID yang didapatkan dari URL
if(hapus($id) > 0){
    echo "<script>
    alert('Success to delete!');
    document.location.href='index.php';
    </script>";
} else{
    echo "<script>
    alert('Failed to delete!');
    document.location.href='index.php';
    </script>";
}

?>