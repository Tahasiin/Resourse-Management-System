<?php

if (isset($_POST['change'])) {

    $username = $_GET['member_username'];

    $directory = '../gallery/faculty/';
    $newimage = $directory . basename($_FILES['member_image']['name']);
    move_uploaded_file($_FILES['member_image']['tmp_name'], $newimage);

    $sql = "UPDATE `faculty` SET `member_image`='$newimage' WHERE member_username = '$username' ";
    if ($conn->query($sql) === TRUE) {
        $success = "Update Completed Successfully !";
        echo "<script type='text/javascript'>alert('$success');</script>";
        echo"<script>document.location='';</script>";
    } else {
        echo "Error updating record:Error updating record:" . $conn->error;
    }
}
?>