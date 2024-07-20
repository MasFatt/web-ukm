<?php

// Koneksikan ke database
include './inc/koneksi.php';

// Dapatkan data dari form
$id_anggota = $koneksi->escape_string($_POST["nama"]);
$status = $koneksi->escape_string($_POST["status"]);



// Buat query UPDATE
$query = "UPDATE anggota SET status = '$status' WHERE nama = '$id_anggota'";

// Jalankan query
$result = $koneksi->query($query);

if ($result) {
  // Jika berhasil, tampilkan pesan sukses
  echo '<script>alert("Success...");window.location="' . $base_url . '/index.php?page=data-anggota";</script>';
} else {
    // Jika gagal, tampilkan pesan kesalahan
    //   echo "Terjadi kesalahan saat mengubah status pengguna: " . $koneksi->error;
}

?>
