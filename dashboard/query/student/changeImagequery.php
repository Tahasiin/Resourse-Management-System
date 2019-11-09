<?php

if (isset($_POST['change'])) {

    $username = $_GET['student_username'];

    $directory = '../gallery/';
    $newimage = $directory . basename($_FILES['student_image']['name']);
    move_uploaded_file($_FILES['student_image']['tmp_name'], $newimage);

    $sql = "UPDATE `students` SET `student_image`='$newimage' WHERE student_username = '$username' ";
    if ($conn->query($sql) === TRUE) {
        $success = "Update Completed Successfully !";
        echo "<script type='text/javascript'>alert('$success');</script>";
        echo"<script>document.location='';</script>";
    } else {
        echo "Error updating record:Error updating record:" . $conn->error;
    }
}
?>