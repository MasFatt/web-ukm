<?php
include "inc/koneksi.php";
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Sistem Informasi Manajemen UKM Pramuka Uniska</title>
    <link rel="icon" href="dist/img/pramuka.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 400px;
        }
        .login-header {
            background-color: #4e73df;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .login-body {
            padding: 40px;
        }
        .form-control {
            border-radius: 25px;
        }
        .btn-login {
            border-radius: 25px;
            padding: 10px;
            font-weight: bold;
        }
        .logo {
            width: 100px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h4 class="mb-0">UKM Pramuka Uniska</h4>
        </div>
        <div class="login-body">
            <div class="text-center mb-4">
                <img src="img/sim.png" alt="Logo" class="logo">
            </div>
            <form action="" method="POST">
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-login" name="btnLogin">Masuk</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php
    if (isset($_POST['btnLogin'])) {
        $username = mysqli_real_escape_string($koneksi, $_POST['username']);
        $password = mysqli_real_escape_string($koneksi, $_POST['password']);

        $sql_login = "SELECT * FROM tb_pengguna WHERE BINARY username='$username' AND password=md5('$password')";
        $query_login = mysqli_query($koneksi, $sql_login);
        $data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
        $jumlah_login = mysqli_num_rows($query_login);

        if ($jumlah_login == 1) {
            $_SESSION["ses_id"] = $data_login["id_pengguna"];
            $_SESSION["ses_nama"] = $data_login["nama_lengkap"];
            $_SESSION["ses_username"] = $data_login["username"];
            $_SESSION["ses_status"] = $data_login["status"];

            echo "<script>
                Swal.fire({
                    title: 'Login Berhasil',
                    text: 'Selamat datang, " . $_SESSION["ses_nama"] . "!',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location = 'index.php';
                });
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    title: 'Login Gagal',
                    text: 'Username atau password salah',
                    icon: 'error',
                    confirmButtonText: 'Coba Lagi'
                });
            </script>";
        }
    }
    ?>
</body>
</html>
