<?php

if (isset($_POST['update'])) {

    $pin = $_GET['admin_pin'];

    $email = $_POST['admin_email'];
    $password = $_POST['admin_password'];

    $sql = "UPDATE `admin` SET `admin_email`='$email',`admin_password`='$password' WHERE admin_pin = '$pin' ";
    if ($conn->query($sql) === TRUE) {
        $success = "Update Completed Successfully !Please Login again.";
            echo "<script type='text/javascript'>alert('$success');</script>";
            echo"<script>document.location='../login/admin.php';</script>";
    } else {
         echo "Error updating record:Error updating record:Error updating record:Error updating record: ".$conn->error;
    }
}
?>