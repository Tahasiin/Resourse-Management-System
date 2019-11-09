<?php

require '../database/connection.php';
session_start();
if (isset($_POST['login'])) {

    $email = $_POST['admin_email'];
    $password = $_POST['admin_password'];

    $sql = "SELECT `admin_email` FROM `admin` WHERE admin_email='$email' AND status = 'active'";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $sql = "SELECT `admin_pin` FROM `admin` WHERE admin_email='$email' AND admin_password = '$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pin = $row["admin_pin"];
                $_SESSION['admin_pin'] = $pin;
                header('Location:../dashboard/admin.php?admin_pin=' . $pin);
            }
        } else {
            $warning = "SORRY ! INCORRECT LOGIN DETAILS!";
            echo "<script type='text/javascript'>alert('$warning');</script>";
            echo"<script>document.location='admin.php';</script>";
        }
    } else {
        $warning = "SORRY ! You are blocked! Or Incorrect Mail Address !";
        echo "<script type='text/javascript'>alert('$warning');</script>";
        echo"<script>document.location='admin.php';</script>";
    }
}
?>