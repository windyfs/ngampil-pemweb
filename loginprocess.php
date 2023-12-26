<?php
session_start();
include('config/koneksi.php');

if (isset($_POST['uname']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: login.php?error=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {
        // Check customer login
        $customer_sql = "SELECT * FROM customer WHERE USERNAME='$uname' AND PASSWORD='$pass'";
        $customer_result = mysqli_query($conn, $customer_sql);

        if (mysqli_num_rows($customer_result) === 1) {
            $row = mysqli_fetch_assoc($customer_result);
            if ($row['USERNAME'] === $uname && $row['PASSWORD'] === $pass) {
                $_SESSION['USERNAME'] = $row['USERNAME'];
                $_SESSION['NAMA_CUSTOMER'] = $row['NAMA_CUSTOMER'];
                $_SESSION['ID_CUSTOMER'] = $row['ID_CUSTOMER'];
                header("Location: index2.php");
                exit();
            } else {
                header("Location: login.php?error=Incorrect User name or password");
                exit();
            }
        } else {
            // Check admin login
            $admin_sql = "SELECT * FROM admin WHERE USERNAME_ADMIN='$uname' AND PASSWORD_ADMIN='$pass'";
            $admin_result = mysqli_query($conn, $admin_sql);

            if (mysqli_num_rows($admin_result) === 1) {
                $admin_row = mysqli_fetch_assoc($admin_result);
                if ($admin_row['USERNAME_ADMIN'] === $uname && $admin_row['PASSWORD_ADMIN'] === $pass) {
                    $_SESSION['USERNAME'] = $admin_row['USERNAME_ADMIN'];
                    $_SESSION['ROLE'] = 'admin'; // Role sebagai admin
                    // Simpan data admin ke dalam session
                    $_SESSION['ID_ADMIN'] = $admin_row['ID_ADMIN'];
                    $_SESSION['NAMA_ADMIN'] = $admin_row['NAMA_ADMIN'];
                    $_SESSION['USERNAME_ADMIN'] = $admin_row['USERNAME_ADMIN'];
                    $_SESSION['EMAIL_ADMIN'] = $admin_row['EMAIL_ADMIN'];
                    $_SESSION['NOTELP_ADMIN'] = $admin_row['NOTELP_ADMIN'];
                    header("Location: index.php");
                    exit();
                } else {
                    header("Location: login.php?error=Incorrect User name or password");
                    exit();
                }
            } else {
                header("Location: login.php?error=Incorrect User name or password");
                exit();
            }
        }
    }
} else {
    header("Location: login.php");
    exit();
}