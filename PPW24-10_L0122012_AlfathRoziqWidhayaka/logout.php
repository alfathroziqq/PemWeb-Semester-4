<?php
require 'koneksi.php';

// Hapus sesi dan cookie
$_SESSION = [];
session_unset();
session_destroy();

// Hapus cookie yang berkaitan dengan login
if (isset($_COOKIE["user_id"])) {
    // Set cookie dengan nilai kadaluarsa 
    setcookie("user_id", "", time() - 3600, "/"); // -1 jam untuk menghapus
}

header("Location: login.php");
exit;
