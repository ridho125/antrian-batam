<?php
include '../config/database.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: antrian-batam/panggilan-antrian");
}



if (isset($_POST['submit'])) {
    $userid = $_POST['userid'];
    $password = md5($_POST['password']);

    $sql = "select * from users where userid = '$userid' and password = '$password'";
    $result = mysqli_query($mysqli, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($userid = $row['userid']) {
            $_SESSION['username'] = $row['username'];
            header("Location: /antrian-batam/panggilan-antrian/");
        } else {
            echo "<script>alert('User atau Password anda salah !. Silahkan coba lagi.')</script>";
        }
    } else {
        echo "<script>alert('Akun anda tidak ditemukan. Silahkan Daftar terlebih dahulu.')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="../assets/css/bootstrap.min.css"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->

    <!-- Bootstrap Icons -->
    <!-- <link rel="stylesheet" href="../assets/css/bootstrap-icons.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> -->

    <!-- Font -->
    <!-- <link rel="stylesheet" href="../assets/css/google.css"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet"> -->

    <!-- DataTables -->
    <!-- <link rel="stylesheet" type="text/css" href="../assets/css/datatables.min.css" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" /> -->


    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->


    <!-- Custom Style -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/loginstyle.css">
    <title>Login Page</title>
</head>
<body>
    <div class="alert alert-warning" role="alert">
        <?php echo $_SESSION['error']?>
    </div>

    <div class="container">
        <form accept="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
            <div class="input-group">
                <input type="text" placeholder="User ID" autocomplete="off" name="userid" value="<?php echo $userid; ?>" require>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" autocomplete="off" name="password" value="<?php echo $_POST['password']; ?>" require>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
            <p class="login-register-text">Kembali ke <a href="http://localhost/antrian-batam/">Dashboard</a></p>
        </form>
    </div>

      <!-- jQuery Core -->
    <script type="text/javascript"  src="../assets/js/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->

    <!-- Popper and Bootstrap JS -->
    <script type="text/javascript"  src="../assets/js/popper.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script> -->
    <script type="text/javascript"  src="../assets/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script> -->

    <script type="text/javascript"  src="../assets/js/html2canvas.js"></script>

</body>
</html>