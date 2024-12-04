<?php
session_start();
require_once "koneksi.php";

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validasi input
    if (empty($username)) {
        $errors['username'] = "Username harus terisi.";
    }
    if (empty($password)) {
        $errors['password'] = "Password harus terisi.";
    }

    // Jika tidak ada error, periksa ke database
    if (empty($errors)) {
        $query = "SELECT * FROM usersTestCon WHERE username = ?";
        $params = array($username);
        $stmt = sqlsrv_query($conn, $query, $params);

        if ($stmt && sqlsrv_has_rows($stmt)) {
            $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

            // Validasi password
            if (hash('sha256', $password) === $row['password']) {
                $_SESSION['username'] = $username;
                header("Location: dashboard.php");
                exit;
            } else {
                $errors['login'] = "Password salah.";
            }
        } else {
            $errors['login'] = "Username tidak ditemukan.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="vh-100">
<div class="container d-flex justify-content-center align-items-center h-100">
    <div class="login-box">
        <h2>Login</h2>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" value="<?= htmlspecialchars($username ?? '') ?>">
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>
</body>
</html>
