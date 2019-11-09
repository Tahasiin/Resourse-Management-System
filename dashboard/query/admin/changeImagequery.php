<?php

if (isset($_POST['change'])) {

    $pin = $_GET['admin_pin'];

    $directory = '../gallery/admin/';
    $newimage = $directory . basename($_FILES['admin_image']['name']);
    move_uploaded_file($_FILES['admin_image']['tmp_name'], $newimage);

    $sql = "UPDATE `admin` SET `admin_image`='$newimage' WHERE admin_pin = '$pin' ";
    if ($conn->query($sql) === TRUE) {
        $success = "Update Completed Successfully !";
        echo "<script type='text/javascript'>alert('$success');</script>";
        echo"<script>document.location='';</script>";
    } else {
        echo "Error updating record:Error updating record:" . $conn->error;
    }
}
?>