<?php

require '../database/connection.php';
session_start();
if (isset($_POST['login'])) {

    $pin = $_POST['member_pin'];
    $password = $_POST['member_password'];
    
    $sql = "SELECT `member_pin` FROM `faculty` WHERE member_pin='$pin' AND status = 'active'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $sql = "SELECT `member_username` FROM `faculty` WHERE member_pin='$pin' AND member_password = '$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $username = $row["member_username"];
                $_SESSION['member_username'] = $username;
                header('Location:../dashboard/faculty.php?member_username=' . $username);
            }
        } else {
            $warning = "SORRY ! INCORRECT LOGIN DETAILS!";
            echo "<script type='text/javascript'>alert('$warning');</script>";
            echo"<script>document.location='faculty.php';</script>";
        }
    } else {
        $warning = "SORRY ! You are blocked! Or Incorrect Pin Number !";
        echo "<script type='text/javascript'>alert('$warning');</script>";
        echo"<script>document.location='faculty.php';</script>";
    }
}
?>